<?php
namespace src\Controller;

use src\Model\Bdd;
use src\Model\Like;
use src\Model\User;



class LikeController extends  AbstractController {
    public function ShowLiked($iduser){
        UserController::idNeed($iduser);
        $likes=new Like();
        $likes->SqlGetUserLiked(Bdd::GetInstance(),$iduser);

        return $this->twig->render('Like/liked.html.twig',[
            "likes"=>$likes
        ]);
    }
}