<?php
namespace src\Controller;

use src\Model\Bdd;
use src\Model\Like;
use src\Model\User;



class LikeController extends  AbstractController{

    public function ShowLiked($iduser){
        UserController::idNeed($iduser);
        $likes=new Like();
        $listlikes = $likes->SqlGetUserLiked(Bdd::GetInstance(),$iduser);
        return $this->twig->render('Like/liked.html.twig',[
            "likes"=>$listlikes
        ]);
    }

    public function ShowLike($iduser){
        UserController::idNeed($iduser);
        $likes=new Like();
        $listlikes=$likes->SqlGetUserLike(Bdd::GetInstance(),$iduser);
        return $this->twig->render('Like/like.html.twig',[
            "likes"=>$listlikes
        ]);
    }
    public function DeleteLike($iduser,$iduserliked){
        UserController::idNeed($iduser);

        if($iduser == $iduserliked){
            $_SESSION['errorlike']="Vous ne pouvez pas vous désabonner de vous même";
            header("location:/Profile/".$iduser);
            return;
        }
        $like=new Like();
        $like->SqlDeleteLike(Bdd::GetInstance(),$iduser,$iduserliked);

        header("location:/Profile/".$iduserliked);
    }

    public function likeSomebody($iduser,$iduserliked){
        UserController::idNeed($iduser);

        if($iduser == $iduserliked){
            $_SESSION['errorlike']="Vous ne pouvez pas vous likez vous même";
            header("location:/Profile/".$iduser);
            return;
        }
        $likes=new Like();
        $listlikes = $likes->SqlGetUserLiked(Bdd::GetInstance(),$iduser);
        foreach($listlikes as $onelike)
        {
            $userliked=$onelike->getUserliked();
            if($userliked==$iduserliked){
                $_SESSION['errorlike']="Vous likez déjà cet utilisateur";
                header("location:/Profile/".$iduserliked);
                return;
            }
        }

        $like=new Like();
        $like->setUserlike($iduser);
        $like->setUserliked($iduserliked);
        $like->setDate(date("Y-m-d H:i:00"));
        $like->SqlAddLike(Bdd::GetInstance());

        $user=new User();
        $userInfo=$user->SqlGet(Bdd::GetInstance(),$iduser);
        $nom=$userInfo->getNom();
        $prenom=$userInfo->getPrenom();

        $typeNotif="Like";
        $contenuNotif=$prenom.' '.$nom." à aimer votre profil";
        $titreNotif = "Votre profil à été liké";

        $photorepo=$userInfo->getPhotoRepo();
        $photonom=$userInfo->getPhotoNom();

        NotificationsController::SendNotifications($iduserliked,$typeNotif,$contenuNotif,$titreNotif,$photorepo,$photonom);

        header('location:/Profile/'.$iduserliked);
        return;

    }


}