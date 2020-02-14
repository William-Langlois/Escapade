<?php

namespace src\Controller;

use src\Model\Bdd;
use src\Model\User;

class UserController extends AbstractController
{

    //Chargement du twig pour la page d'inscription
    public function inscriptionForm()
    {
        unset($_SESSION['errorinscription']);
        unset($_SESSION['errorinscriptionhtml']);
        unset($_SESSION['errorinscriptionhtmllink']);

        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;
        return $this->twig->render('User/inscription.html.twig', ['token' => $token]);
    }

    //Chargement du twig pour la page connexion
    public function loginForm()
    {
        unset($_SESSION['errorlogin']);

        $token = bin2hex(random_bytes(32));
        $_SESSION['token'] = $token;
        return $this->twig->render('User/connexion.html.twig', ['token' => $token]);
    }


    //Fonction qui traite les données renvoyées par le formulaire d'inscription
    public function InscriptionCheck()
    {
        if ($_POST && $_POST['crsf'] == $_SESSION['token']) {

            //verifie que le mdp contient au moins 5 caractère sans compter les espaces en début et fin de chaine
            if (!filter_var(
                trim($_POST['Password']),
                FILTER_VALIDATE_REGEXP,
                array("options" => array("regexp" => "/[a-zA-Z]{5,}/")))
            ) {
                //Si ce n'est pas le cas on renvoi une erreur
                $_SESSION['errorinscription'] = "Le mot de passe ne peut être inférieur à 5 caractères";
                header('Location:/Inscription');
                return;
            }

            //verifie que le mot de passe ne contient pas de mot de passe en début et fin de chaine
            if (($_POST['Password']) != (trim($_POST['Password']))) {
                $_SESSION['errorinscription'] = "Le mot de passe ne peut commencer ou finir par un espace";
                header('Location:/Inscription');
                return;
            }

            //de même pour le mot de passe de vérification
            if (($_POST['Password2']) != (trim($_POST['Password2']))) {
                $_SESSION['errorinscription'] = "Le mot de passe ne peut commencer ou finir par un espace";
                header('Location:/Inscription');
                return;
            }

            //Verfie que le mot de passe ne contient pas de balises
            if (trim($_POST['Password']) != strip_tags(trim($_POST['Password']))) {
                $_SESSION['errorinscription'] = "Le mot de passe n'a pas une structure valide";
                header('Location:/Inscription');
                return;
            }
            //idem pour le nom
            if (trim($_POST['Nom']) != strip_tags(trim($_POST['Nom']))) {
                $_SESSION['errorinscription'] = "Le nom entré n'a pas une structure valide";
                header('Location:/Inscription');
                return;
            }
            //idem pour le prenom
            if (trim($_POST['Prenom']) != strip_tags(trim($_POST['Prenom']))) {
                $_SESSION['errorinscription'] = "Le Prenom entré n'a pas une structure valide";
                header('Location:/Inscription');
                return;
            }
            //verifie la correspondance du champ mdp et du champ confirmation du mdp
            if (($_POST['Password']) != ($_POST['Password2'])) {
                $_SESSION['errorinscription'] = "Les mots de passe ne correspondent pas";
                header('Location:/Inscription');
                return;
            }

            //verifie que l'email ne contient pas de balises
            if (trim($_POST['Email']) != strip_tags(trim($_POST['Email']))) {
                $_SESSION['errorinscription'] = "L'addresse Email n'a pas une structure valide";
                header('Location:/Inscription');
                return;
            }

            //=======================recupère tout les emails dans la bdd==============================
            $userall = new User();
            $emails = $userall->SqlGetAllEmail(Bdd::GetInstance());
            $email_exist = false;
            //===========================================================================
            //========================================regarde si l'email entré dans l'inscription est déjà dans la bdd
            foreach ($emails as $email) {
                if (strtolower(trim($_POST['Email'])) == strtolower(trim($email))) {
                    $email_exist = true;
                }
            }
            //===================================================================

            //Si l'email existe déjà dans la bdd on renvoi une erreur contenant un lien pour aller à la page de connexion
            if ($email_exist == true) {
                $_SESSION['errorinscriptionhtmllink'] = '/Login';
                $_SESSION['errorinscriptionhtml'] = "Se connecter";
                $_SESSION['errorinscription'] = "L'email appartient déjà à un compte existant : ";
                header('Location:/Inscription');
                return;

            } else {

                //================================Hashage du mot de passe=========================
                $options = [
                    'salt' => md5(strtolower($_POST['Email'])),
                    'cost' => 12 // the default cost is 10
                ];
                define('PEPPER', sha1(strtolower($_POST['Email'])));
                $pwd_hashed = password_hash(($_POST['Password']) . PEPPER, PASSWORD_DEFAULT, $options);
                //=======================================================================
                //création de l'objet user qui va etre inséré dans la bdd

                {
                    $user = new User();
                    $user->setPrenom(trim($_POST["Prenom"]));
                    $user->setNom(trim($_POST["Nom"]));
                    $user->setEmail(strtolower(trim($_POST['Email'])));
                    $user->setPassword($pwd_hashed);
                    $user->setDateinscription(date("d-m-Y"));

                    //ajout dans la bdd via la fonction adéquat dans le model
                    $user->SqlAdd(Bdd::GetInstance());
                    //defait les session error(les erreurs disparaissent apres un rafraichissement de page)
                    unset($_SESSION['errorinscription']);
                    unset($_SESSION['errorlogin']);
                    //renvoi sur la page de connexion
                    header('Location:/Login');
                }
            }
        }
    }


    //Gestion des données entrées dans le formulaire de connexion
    public function loginCheck()
    {

        if ($_POST && $_POST['crsf'] == $_SESSION['token']) {
            //=======================recupère tout les emails dans la bdd==============================
            $userall = new User();
            $emails = $userall->SqlGetAllEmail(Bdd::GetInstance());
            $email_exist = false;
            //===========================================================================
            //========================================regarde si l'email entré dans l'inscription est déjà dans la bdd
            foreach ($emails as $email) {
                if (strtolower(trim($_POST['email'])) == strtolower(trim($email))) {
                    $email_exist = true;
                }
            }
            //===================================================================
            if ($email_exist == false) {
                $_SESSION['errorlogin'] = "Email ou Mot de passe incorrect";
                header('Location:/Login');
                return;
            }

            //Si on clique sur "mot de passe oublié" => On affiche l'erreur Oh mince.. C'est dommage ça !


            //Verifie que l'email ne contient pas uniquement des espaces
            if (trim($_POST['email']) == '') {
                $_SESSION['errorlogin'] = "Veuillez entrer une adresse Email";
                header('Location:/Login');
                return;
            }

            //Verifie que le mot de passe ne contient pas uniquement des espaces
            if (trim($_POST['password']) == '') {
                $_SESSION['errorlogin'] = "Veuillez entrer un mot de passe";
                header('Location:/Login');
                return;
            }

            //Verifie que le mot de passe ne contient pas de balises (<scritp> , <?php ,etc..)
            if (trim($_POST['password']) != strip_tags(trim($_POST['password']))) {
                $_SESSION['errorlogin'] = "Le mot de passe n'a pas une structure valide";
                header('Location:/Login');
                return;
            }

            //Verifie que l'email ne contient pas de balises (<scritp> , <?php ,etc..)
            if (trim($_POST['email']) != strip_tags(trim($_POST['email']))) {
                $_SESSION['errorlogin'] = "L'adresse email n'a pas une structure valide";
                header('Location:/Login');
                return;
            }

            // Test du Captcha
            // Ma clé privée
            $secret = "6LcoR9gUAAAAAI7mP24GMRf0qbxy4O7G6Ttv2AVJ";
            // Paramètre renvoyé par le recaptcha
            $response = $_POST['g-recaptcha-response'];
            // On récupère l'adresse IP de l'utilisateur
            $remoteip = $_SERVER['REMOTE_ADDR'];

            $api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
                . $secret
                . "&response=" . $response
                . "&remoteip=" . $remoteip;

            $decode = json_decode(file_get_contents($api_url), true);
            //---

            //===========================Hash du mot de passe(pour la verification)===========================================
            //On définit un salt et un cost
            $options = [
                //le salt est propre à chaque utilisateur
                'salt' => md5(strtolower($_POST['email'])),
                'cost' => 12 // the default cost is 10
            ];
            //on définit un pepper propre à chaque utilisateur != du salt
            define('PEPPER', sha1(strtolower($_POST['email'])));
            //hashage : On hash le mot de passe entré avec son pepper , avec l'algorythme password_default (BCRYPT)
            $pwd_hashed_entry = password_hash(($_POST['password']) . PEPPER, PASSWORD_DEFAULT, $options);
            //===========================================================================================================

            //==================================Recupération des info utilisateur en fonction de l'email entré==============
            $user = new User();
            $userInfoLog = $user->SqlGetLogin(Bdd::GetInstance(), ($_POST['email']));
            $userid=$userInfoLog['USER_ID'];
            BanController::CheckBan($userid);
            $pwd_hashed_bdd = $userInfoLog['USER_PASSWORD'];
            //================================================================


            //=======================Vérification de la validité du mdp====================================
            //Si le mot de passe hashé entré correspond au mot de passe hashé en BDD
            if ($pwd_hashed_entry == $pwd_hashed_bdd and $decode['success'] == true) {
                //on crée un tableau à partir de la colonne "role" de l'utilisateur correspondant
                //(les roles sont enregistrés sous la forme d'une chaine de caractère , séparé par un espace)
                //On enregistre dans la session 'login' : l'id , les roles , le prenom , le nom , le status , l'email
                $_SESSION['login'] = array("id" => $userInfoLog['USER_ID'],
                    "prenom" => $userInfoLog['USER_PRENOM'],
                    "nom" => $userInfoLog['USER_NOM'],
                    "email" => $userInfoLog['USER_EMAIL'],
                    "photo"=>$userInfoLog['USER_PHOTO'],
                    "ville"=>$userInfoLog['USER_VILLE'],
                    "birthdate"=>$userInfoLog['USER_BIRTHDATE']);
                if($_SESSION['login']['ville'] != '') {
                    header('Location:/Accueil');
                }
                else{
                    header('Location:/ProfileSetup/'.$_SESSION['login']['id']);
                }
                //Si les mots de passes en correspondent pas on renvoi une erreur d'authentification
            } else {
                $_SESSION['errorlogin'] = "Email, Mot de passe ou CAPTCHA incorrect";
                header('Location:/Login');
                return;
            }
        }
    }


    //Fonction qui permet de verifier que l'utilisateur à le bon id
    public static function idNeed($idATester)
    {
        if (isset($_SESSION['login'])) {
            if ($idATester != ($_SESSION['login']['id'])) {
                $_SESSION['errorlogin'] = "Le compte n°" . $idATester . " ne vous appartient pas";
                header('Location:/Login');
            }
        } else {
            $_SESSION['errorlogin'] = "Veuillez-vous identifier";
            header('Location:/Login');
        }
    }


    //fonction qui permet d'afficher le profil
    public function ShowProfile($idUser)
    {
        if(!isset ($_SESSION['login'])){
            $_SESSION['errorlogin'] = "Veuillez-vous identifier";
            header('Location:/Login');
            return;
        }
        //verification que le profil concerné appartient bien à l'utilisateur concerné
        $user=new User();
        $userInfo=$user->SqlGet(Bdd::GetInstance(),$idUser);
        $age = date('Y') - date('Y', strtotime($userInfo->getBirthdate()));
        if (date('m-d') < date('m-d' ,strtotime($userInfo->getBirthdate()))) {
                $age=$age - 1;
            }

        //permet de retirer les messages d'infos après un refresh
        unset($_SESSION['infoprofil']);
        return $this->twig->render('User/profil.html.twig', [
            "userid"=>$idUser,
            "infoUser"=>$userInfo,
            "age"=>$age
        ]);
    }

    public function ShowSetupProfil($iduser){
        UserController::idNeed($iduser);
        return $this->twig->render('User/setupProfil.html.twig');
    }

    public function ShowUpdateProfile($iduser){
        UserController::idNeed($iduser);
        return $this->twig->render('User/paramProfil.html.twig');
    }

    public function UpdateProfile($iduser){
        UserController::idNeed($iduser);
        $user=new User();
        $user->setPhoto($_POST['avatarfile']);
        $user->setPrenom($_POST['First_Name']);
        $user->setNom($_POST['Last_Name']);
        $user->setBirthdate($_POST['Birthday']);
        $user->setSexe($_POST['Gender']);
        $user->setVille($_POST['City']);
        $user->setPays($_POST['Country']);
        $user->setNeedsexe($_POST['Genderneed']);
        $user->setWannadateathome($_POST['athome']);
        $user->setNeedville($_POST['Cityneed']);
        $user->setGalerieispublic($_POST['galerieispublic']);

        $user->setIduserci($iduser);
        $user->setNomci($_POST['Hobby']);

        $user->SqlUpdate(Bdd::GetInstance(),$iduser);

        header('location:/Profile/'.$iduser);

    }


    public function ShowGalerie($iduser){
        UserController::idNeed($iduser);
        return $this->twig->render('User/galerie.html.twig');
    }

    public function ShowMap(){
        return $this->twig->render('Map/map.html.twig');
    }

    //fonction qui permetTRA (amélioration continue m'voyez) de modifier son email , nom , prenom directement depuis le profil


//Fonction qui permet de se déconnecter (vide et supprime les session utilisateurs
    public
    function logout()
    {
        unset($_SESSION['login']);
        unset($_SESSION['errorlogin']);
        session_destroy();

        header('Location:/');
    }
}