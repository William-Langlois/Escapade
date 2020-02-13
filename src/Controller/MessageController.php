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
    $infoUser=[];
    foreach ($conversations as $conv){
        $user=new User();
        $infoUser[]=$user->SqlGet(Bdd::GetInstance(), $conv);
    }

    return $this->twig->render('Chat/chat.html.twig',[
        "convdisp"=>$infoUser
    ]);

}
public function ShowOneChat($idUser,$iddest){
    UserController::idNeed($idUser);

    $Conv=new Message();
    $conversations=$Conv->SqlGetConv(Bdd::GetInstance(),$idUser);
    $infoUser=[];
    foreach ($conversations as $conv){
        $user=new User();
        $infoUser[]=$user->SqlGet(Bdd::GetInstance(), $conv);
    }

    $userr=new User();
    $activeconvinfo= $userr->SqlGet(Bdd::GetInstance(),$iddest);

    $ActiveMessages=new Message();
    $ActiveConv=$ActiveMessages->SqlGetChat(Bdd::GetInstance(),$idUser,$iddest);
    return $this->twig->render('Chat/chat.html.twig',[
        "convdisp"=>$infoUser,
        "activeConvMessage" => $ActiveConv,
        "activeconvinfo"=>$activeconvinfo,
        "iddest"=>$iddest
    ]);

}

public function SendMessage($idUser,$iddest)
{
    UserController::idNeed($idUser);
    if ($_POST){
        $message = new Message();
    $message->setEnvoyeur($idUser);
    $message->setDestinataire($iddest);
    $message->setContenu($_POST['contenu']);

    $typeNotif = "Message";
    $MessageArray = explode(" ", $_POST['contenu']);
    if ((count($MessageArray)) >= 5) {
        $messageFirstWord = '';
        for ($i = 0; $i < 5; $i++) {
            $messageFirstWord = $messageFirstWord . ' ' . $MessageArray[$i];
        }
    } else {
        $messageFirstWord = $_POST['contenu'];
    }

    $titreNotif = "New Message from " . $idUser;

    NotificationsController::SendNotifications($iddest, $typeNotif, $messageFirstWord, $titreNotif);
    $message->SqlAddMessage(Bdd::GetInstance());
    header('location:/chat/' . $idUser . '/' . $iddest);
    return;
}

}

}