<?php
namespace src\Controller;

use src\Model\Bdd;
use src\Model\Message;
use src\Model\User;

class MessageController extends  AbstractController {

public function ShowChats($idUser){
    UserController::idNeed($idUser);
    $Conv=new Message();
    $conversations=$Conv->SqlGetConv(Bdd::GetInstance(),$idUser);

    return $this->twig->render('Chat/chat.html.twig',[
        "conversations" => $conversations
    ]);

}
public function ShowOneChat($idUser,$iddest){
    UserController::idNeed($idUser);

    $Conv=new Message();
    $conversations=$Conv->SqlGetConv(Bdd::GetInstance(),$idUser);

    $ActiveMessages=new Message();
    $ActiveConv=$ActiveMessages->SqlGetChat(Bdd::GetInstance(),$idUser,$iddest);

    return $this->twig->render('Chat/chat.html.twig',[
        "conversations" => $conversations,
        "activeConvMessage" => $ActiveConv,
        "iddest"=>$iddest
    ]);

}

public function SendMessage($idUser,$iddest){
    UserController::idNeed($idUser);

    $message=new Message();
    $message->setEnvoyeur($idUser);
    $message->setDestinataire($iddest);
    $message->setContenu($_POST['contenu']);

    $message->SqlAddMessage(Bdd::GetInstance());

    header('location:/chat/'.$idUser.'/'.$iddest);

}

}