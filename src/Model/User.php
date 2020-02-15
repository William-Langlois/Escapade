<?php

namespace src\Model;
use mysql_xdevapi\Exception;

class User implements \JsonSerializable
{
    private $id;
    private $nom;
    private $prenom;
    private $description;
    private $email;
    private $password;
    private $posx;
    private $posy;
    private $pays;
    private $ville;
    private $dateinscription;
    private $lastconnection;
    private $sexe;
    private $photoNom;
    private $photoRepo;
    private $wannadateathome;
    private $isadmin;
    private $acceptemail;
    private $acceptmessage;
    private $activenotif;
    private $birthdate;
    private $needsexe;
    private $needville;
    private $km;
    private $galerieispublic;

    /**
     * @return mixed
     */
    public function getPhotoNom()
    {
        return $this->photoNom;
    }

    /**
     * @param mixed $photoNom
     */
    public function setPhotoNom($photoNom)
    {
        $this->photoNom = $photoNom;
    }

    /**
     * @return mixed
     */
    public function getPhotoRepo()
    {
        return $this->photoRepo;
    }

    /**
     * @param mixed $photoRepo
     */
    public function setPhotoRepo($photoRepo)
    {
        $this->photoRepo = $photoRepo;
    }



    /**
     * @return mixed
     */
    public function getGalerieispublic()
    {
        return $this->galerieispublic;
    }

    /**
     * @param mixed $galerieispublic
     */
    public function setGalerieispublic($galerieispublic)
    {
        $this->galerieispublic = $galerieispublic;
    }

    /**
     * @return mixed
     */
    public function getNeedville()
    {
        return $this->needville;
    }

    /**
     * @param mixed $needville
     */
    public function setNeedville($needville)
    {
        $this->needville = $needville;
    }

    /**
     * @return mixed
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     * @param mixed $km
     */
    public function setKm($km)
    {
        $this->km = $km;
    }



    /**
     * @return mixed
     */
    public function getNeedsexe()
    {
        return $this->needsexe;
    }

    /**
     * @param mixed $needsexe
     */
    public function setNeedsexe($needsexe)
    {
        $this->needsexe = $needsexe;
    }



    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPosx()
    {
        return $this->posx;
    }

    /**
     * @param mixed $posx
     */
    public function setPosx($posx)
    {
        $this->posx = $posx;
    }

    /**
     * @return mixed
     */
    public function getPosy()
    {
        return $this->posy;
    }

    /**
     * @param mixed $posy
     */
    public function setPosy($posy)
    {
        $this->posy = $posy;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }


    /**
     * @return mixed
     */
    public function getDateinscription()
    {
        return $this->dateinscription;
    }

    /**
     * @param mixed $dateinscription
     */
    public function setDateinscription($dateinscription)
    {
        $this->dateinscription = $dateinscription;
    }

    /**
     * @return mixed
     */
    public function getLastconnection()
    {
        return $this->lastconnection;
    }

    /**
     * @param mixed $lastconnection
     */
    public function setLastconnection($lastconnection)
    {
        $this->lastconnection = $lastconnection;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }
    /**
     * @return mixed
     */
    public function getWannadateathome()
    {
        return $this->wannadateathome;
    }

    /**
     * @param mixed $wannadateathome
     */
    public function setWannadateathome($wannadateathome)
    {
        $this->wannadateathome = $wannadateathome;
    }

    /**
     * @return mixed
     */
    public function getIsadmin()
    {
        return $this->isadmin;
    }

    /**
     * @param mixed $isadmin
     */
    public function setIsadmin($isadmin)
    {
        $this->isadmin = $isadmin;
    }

    /**
     * @return mixed
     */
    public function getAcceptemail()
    {
        return $this->acceptemail;
    }

    /**
     * @param mixed $acceptemail
     */
    public function setAcceptemail($acceptemail)
    {
        $this->acceptemail = $acceptemail;
    }

    /**
     * @return mixed
     */
    public function getAcceptmessage()
    {
        return $this->acceptmessage;
    }

    /**
     * @param mixed $acceptmessage
     */
    public function setAcceptmessage($acceptmessage)
    {
        $this->acceptmessage = $acceptmessage;
    }

    /**
     * @return mixed
     */
    public function getActivenotif()
    {
        return $this->activenotif;
    }

    /**
     * @param mixed $activenotif
     */
    public function setActivenotif($activenotif)
    {
        $this->activenotif = $activenotif;
    }


   public function SqlAddVoyage(\PDO $bdd,$iduser){



        $queryvoy = $bdd->prepare('INSERT INTO voyage (USER_ID, VOYAGE_FROM_PAYS, VOYAGE_FROM_VILLE, VOYAGE_DESTINATION_PAYS, VOYAGE_DESTINATION_VILLE, VOYAGE_DATEDEBUT, VOYAGE_DATEFIN) VALUES (:userid,:frompaysvoy,:fromvillevoy,:topaysvoy,:tovillevoy,:fromdatevoy,:todatevoy)');
        $queryvoy->execute([
           "userid"=>$iduser,
           "frompaysvoy"=>$this->getFrompaysvoy(),
           "fromvillevoy"=>$this->getFromvillevoy(),
           "topaysvoy"=>$this->getTopaysvoy(),
           "tovillevoy"=>$this->getTovillevoy(),
           "fromdatevoy"=>$this->getFromdatevoy(),
           "todatevoy"=>$this->getTodatevoy()
        ]);
    }




    public function jsonSerialize()
    {
        return [
            'user_id' => $this->getId(),
            'user_nom' => $this->getNom(),
            'user_prenom' => $this->getPrenom(),
            'user_description' => $this->getDescription(),
            'user_email' => $this->getEmail(),
            'user_password' => $this->getPassword(),
            'user_pos_x' => $this->getPosX(),
            'user_pos_y' => $this->getPosY(),
            'user_pays' => $this->getPays(),
            'user_ville' => $this->getVille(),
            'user_date_inscription' => $this->getDateInscription(),
            'user_last_connection' => $this->getLastConnection(),
            'user_sexe' => $this->getSexe(),
            'user_photo' => $this->getPhoto(),
            'user_wannadateathome' => $this->getWannadateathome(),
            'user_isadmin' => $this->getIsadmin(),
            'user_accept_email' => $this->getAcceptEmail(),
            'user_accept_message' => $this->getAcceptMessage(),
            'user_active_notif' => $this->getActiveNotif(),
            'user_birthdate' => $this->getBirthdate()
        ];
    }

    public function SqlUpdate(\PDO $bdd,$iduser){
        $query = $bdd->prepare('UPDATE user SET USER_PHOTOREPO=:photorepo,USER_PHOTONOM=:photonom,USER_PRENOM=:prenom,USER_NOM=:nom,USER_BIRTHDATE=:birthdate,USER_SEXE=:sexe,USER_VILLE=:ville,USER_PAYS=:pays,USER_NEEDSEXE=:needsexe,USER_WANNADATEATHOME=:wannadateathome,USER_NEEDVILLE=:needville,USER_GALERIEISPUBLIC=:galerieispublic WHERE USER_ID=:id');
        $query->execute([
            "id"=>$iduser,
            "photonom"=>$this->getPhotoNom(),
            "photorepo"=>$this->getPhotoRepo(),
            "prenom"=>$this->getPrenom(),
            "nom"=>$this->getNom(),
            "birthdate"=>$this->getBirthdate(),
            "sexe"=>$this->getSexe(),
            "ville"=>$this->getVille(),
            "pays"=>$this->getPays(),
            "needsexe"=>$this->getNeedsexe(),
            "wannadateathome"=>$this->getWannadateathome(),
            "needville"=>$this->getNeedville(),
            "galerieispublic"=>$this->getGalerieispublic(),

        ]);
    }


    public function SqlGet(\PDO $bdd , $iduser){
    $query = $bdd->prepare('SELECT * FROM user WHERE USER_ID = :userid');
    $query->execute([
        'userid' => $iduser
    ]);

    $UserInfo= $query->fetch();
    $user = new User();
    $user->setId($UserInfo['USER_ID']);
    $user->setNom($UserInfo['USER_NOM']);
    $user->setPrenom($UserInfo['USER_PRENOM']);
    $user->setDescription($UserInfo['USER_DESCRIPTION']);
    $user->setEmail($UserInfo['USER_EMAIL']);
    $user->setPassword($UserInfo['USER_PASSWORD']);
    $user->setPosx($UserInfo['USER_POS_X']);
    $user->setPosy($UserInfo['USER_POS_Y']);
    $user->setPays($UserInfo['USER_PAYS']);
    $user->setVille($UserInfo['USER_VILLE']);
    $user->setDateInscription($UserInfo['USER_DATE_INSCRIPTION']);
    $user->setLastConnection($UserInfo['USER_LAST_CONNECTION']);
    $user->setSexe($UserInfo['USER_SEXE']);
    $user->setPhotoNom($UserInfo['USER_PHOTONOM']);
    $user->setPhotoRepo($UserInfo['USER_PHOTOREPO']);
    $user->setWannadateathome($UserInfo['USER_WANNADATEATHOME']);
    $user->setIsadmin($UserInfo['USER_ISADMIN']);
    $user->setAcceptEmail($UserInfo['USER_ACCEPT_EMAIL']);
    $user->setAcceptMessage($UserInfo['USER_ACCEPT_MESSAGE']);
    $user->setActiveNotif($UserInfo['USER_ACTIVE_NOTIF']);
    $user->setBirthdate($UserInfo['USER_BIRTHDATE']);
    $user->setNeedsexe($UserInfo['USER_NEEDSEXE']);
    $user->setNeedville($UserInfo['USER_NEEDVILLE']);
    $user->setGalerieispublic($UserInfo['USER_GALERIEISPUBLIC']);

    $UserInfoReturn = $user;

    return $UserInfoReturn;
}


    public function SqlDelete(\PDO $bdd , $iduser){

        try {
            $query = $bdd->prepare('DELETE FROM user WHERE USER_ID = :userid');
            $query->execute([
                'userid' => $iduser
            ]);
            return array("result"=>true,"message"=>"Suppression réussie");
        }catch (\Exception $e){
            return array("result"=>false,"message"=>$e->getMessage());
        }
    }

    public function SqlGetAllEmail(\PDO $bdd){

        $query = $bdd->prepare("SELECT USER_EMAIL FROM user ");
        $query->execute();
        $arrayUser = $query->fetchAll();

        $emailUsers = [];
        foreach ($arrayUser as $userSQL){
            $user = new User();
            $user->setEmail(strtolower($userSQL['USER_EMAIL']));

            $emailUsers[] = $user->getEmail();
        }
        return $emailUsers;
    }


    public function SqlGetLogin(\PDO $bdd , $emailuser){
            $query = $bdd->prepare('SELECT USER_PASSWORD,USER_ID,USER_EMAIL,USER_NOM,USER_PRENOM,USER_VILLE,USER_PHOTONOM,USER_PHOTOREPO,USER_BIRTHDATE FROM user WHERE USER_EMAIL = :useremail');
            $query->execute([
                'useremail' => $emailuser
            ]);

            $UserInfoLog = $query->fetch();
            $user = new User();
            $user->setPassword($UserInfoLog['USER_PASSWORD']);
            $user->setId($UserInfoLog['USER_ID']);
            $user->setNom($UserInfoLog['USER_NOM']);
            $user->setPrenom($UserInfoLog['USER_PRENOM']);
            $user->setEmail($UserInfoLog['USER_EMAIL']);
            $user->setPhotoNom($UserInfoLog['USER_PHOTONOM']);
            $user->setPhotoRepo($UserInfoLog['USER_PHOTOREPO']);
            $user->setVille($UserInfoLog['USER_VILLE']);
            $user->setBirthdate($UserInfoLog['USER_BIRTHDATE']);
            $user->setLastconnection(date("d-m-Y G:i"));

            $UserInfoLog[] = $user;

            return $UserInfoLog;
    }


    public function SqlGetAll(\PDO $bdd){
        $query = $bdd->prepare('SELECT * FROM user');
        $query->execute();
        $arrayUser = $query->fetchAll();

        $listUser = [];
        foreach ($arrayUser as $userSQL){
            $user = new User();
            $user->setId($userSQL['USER_ID']);
            $user->setNom($userSQL['USER_NOM']);
            $user->setPrenom($userSQL['USER_PRENOM']);
            $user->setDescription($userSQL['USER_DESCRIPTION']);
            $user->setEmail($userSQL['USER_EMAIL']);
            $user->setPassword($userSQL['USER_PASSWORD']);
            $user->setPosx($userSQL['USER_POS_X']);
            $user->setPosy($userSQL['USER_POS_Y']);
            $user->setPays($userSQL['USER_PAYS']);
            $user->setVille($userSQL['USER_VILLE']);
            $user->setDateInscription($userSQL['USER_DATE_INSCRIPTION']);
            $user->setLastConnection($userSQL['USER_LAST_CONNECTION']);
            $user->setSexe($userSQL['USER_SEXE']);
            $user->setPhoto($userSQL['USER_PHOTO']);
            $user->setWannadateathome($userSQL['USER_WANNADATEATHOME']);
            $user->setIsadmin($userSQL['USER_ISADMIN']);
            $user->setAcceptEmail($userSQL['USER_ACCEPT_EMAIL']);
            $user->setAcceptMessage($userSQL['USER_ACCEPT_MESSAGE']);
            $user->setActiveNotif($userSQL['USER_ACTIVE_NOTIF']);
            $user->setBirthdate($userSQL['USER_BIRTHDATE']);


            $listUser[] = $user;
        }
        return $listUser;
    }

    public function SqlAdd(\PDO $bdd) {
        //try{
            $query = $bdd->prepare('INSERT INTO user (USER_PRENOM, USER_NOM, USER_PASSWORD, USER_EMAIL) VALUES (:prenom, :nom, :password, :email)');
            $query->execute([
                "prenom" => $this->getPrenom(),
                "nom" => $this->getNom(),
                "password" => $this->getPassword(),
                "email" => $this->getEmail()
            ]);
    }

    }