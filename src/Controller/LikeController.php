<?php
namespace src\Controller;

use src\Model\Bdd;
use src\Model\Like;
use src\Model\User;



class LikeController extends  AbstractController {
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

    public function likeSomebody($iduser,$iduserliked){
        UserController::idNeed($iduser);

        if($iduser == $iduserliked){
            $_SESSION['errorlike']="Vous ne pouvez pas vous likez vous même";
            header("location:/");
            return;
        }

        $like=new Like();
        $like->setUserlike($iduser);
        $like->setUserliked($iduserliked);
        $like->setDate(date("Y-m-d H:i:00"));
        $like->SqlAddLike(Bdd::GetInstance());

        header('location:/Liked/'.$iduser);
        return;

    }


}