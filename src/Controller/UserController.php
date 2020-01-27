<?php


namespace src\Controller;

use MongoDB\BSON\Timestamp;
use src\Model\User;
use src\Model\Bdd;
use DateTime;

class UserController extends AbstractController
{
    public function Index()
    {
        return $this->ListAll();
    }

    public function ListAll()
    {
        $user = new User();
        $listUser = $user->SqlGetAll(Bdd::GetInstance());
        return $this->twig->render(
            'User/list.html.twig', [
                'userList' => $listUser
            ]
        );
    }

    public function Show($iduser)
    {
        $user = new User();
        $userInfo = $user->SqlGet(Bdd::GetInstance(), $iduser);
        return $this->twig->render(
            'User/show.html.twig', [
                'infoUser' => $userInfo
            ]
        );

    }

    public function Inscription()
    {
        if($_POST)
        {
             define('KEY',md5('key'));
             define('SALT', md5($_POST['Email']));
             define('PEPPER', sha1($_POST['Email']));
             $pwd = $_POST['Password'];
             $pwd_Spicy = hash_hmac("sha256", SALT.$pwd.PEPPER, KEY  );
             $pwd_hashed = password_hash($pwd_Spicy, PASSWORD_ARGON2ID);

             $user= new User();
             $user->setPrenom($_POST["Prenom"]);
                  $user->setNom($_POST["Nom"]);
                  $user->setEmail($_POST['Email']);
                  $user->setVille($_POST['Ville']);
                  $user->setPassword($pwd_hashed)
                ;
                $user->SqlAdd(Bdd::GetInstance());
                header('Location:/User/ListAll');
        }
        else {
            return $this->twig->render("User/inscription.html.twig");
        }
    }

public function Connection()
{
    if($_POST)
    {
        define('KEY',md5('key'));
        define('SALT', md5($_POST['Email']));
        define('PEPPER', sha1($_POST['Email']));
        $pwd = $_POST['Password'];
        $pwd_Spicy = hash_hmac("sha256", SALT.$pwd.PEPPER, KEY  );
        $pwd_hashed = password_hash($pwd_Spicy, PASSWORD_ARGON2ID);

        $user=new User();
        $userpass=
        $user->SqlGet(Bdd::GetInstance());
        if($pwd_hashed==user.USER_PASSWORD)
        header('Location:/User/ListAll');
    }
    else {
        return $this->twig->render("User/connection.html.twig");
    }
}
}