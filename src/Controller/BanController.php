<?php
namespace src\Controller;

use MongoDB\Driver\Session;
use src\Model\Ban;
use src\Model\Bdd;
use src\Model\User;

class BanController extends  AbstractController
{
    public static function CheckBan($iduser){
        $ban=new Ban();
        $lastban=$ban->SqlGetBan(Bdd::GetInstance(),$iduser);
        if($lastban[0] != ''){
            $_SESSION['errorlogin']="Vous avez été banni ";
            header("location:/login");
            die;
        }
    }

    public function Ban($idconcerne){
        $ban=new Ban();
        $ban->setRaison($_POST['raison']);
        $ban->setDatedebut(date("Y-m-d G:i:s"));
        $ban->setDatefin($_POST['datefin']);
        $ban->setConcerne($idconcerne);
        $ban->setAdmin($_SESSION['login']['Prenom']);

        $ban->SqlAddBan(Bdd::GetInstance());
    }

    public function ShowBanForm($idconcerne)
    {
        return $this->twig->render('Ban/banform.html.twig',[
            "concerne"=>$idconcerne
        ]);

    }
}