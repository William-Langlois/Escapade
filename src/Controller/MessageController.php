<?php
namespace src\Controller;

use src\Model\Bdd;
use src\Model\Contenu;
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
public function ShowOneChat($idUser,$iddest)
{
    UserController::idNeed($idUser);

    $Conv = new Message();
    $conversations = $Conv->SqlGetConv(Bdd::GetInstance(), $idUser);
    $infoUser = [];
    foreach ($conversations as $conv) {
        $user = new User();
        $infoUser[] = $user->SqlGet(Bdd::GetInstance(), $conv);
    }

    $userr = new User();
    $activeconvinfo = $userr->SqlGet(Bdd::GetInstance(), $iddest);

    $ActiveMessages = new Message();
    $ActiveConv = $ActiveMessages->SqlGetChat(Bdd::GetInstance(), $idUser, $iddest);

            $lastmessage = $ActiveConv[array_key_last($ActiveConv)];
            $lastmessageContenu = $lastmessage->GetContenu();
            $extraitMessageArray = explode(" ", $lastmessageContenu);

            if ((count($extraitMessageArray)) >= 5) {
                $messageFirstWord = '';
                for ($i = 0; $i < 5; $i++) {
                    $messageFirstWord = $messageFirstWord . ' ' . $extraitMessageArray[$i];
                }
            } else {
                $messageFirstWord = $lastmessageContenu;
            }


    return $this->twig->render('Chat/chat.html.twig',[
        "convdisp"=>$infoUser,
        "activeConvMessage" => $ActiveConv,
        "activeconvinfo"=>$activeconvinfo,
        "iddest"=>$iddest,
        "extraitMessage"=>$messageFirstWord
    ]);

}

public function SendMessage($idUser,$iddest)
{
    UserController::idNeed($idUser);
    if ($_POST){
        var_dump($_POST['contenu']);
        $message = new Message();
    $message->setEnvoyeur($idUser);
    $message->setDestinataire($iddest);
    $message->setContenu($_POST['contenu']);
    $message->setDateenvoi(date("Y-m-d G:h:i"));
    $message->SqlAddMessage(Bdd::GetInstance());

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
    $user=new User();
    $userInfo=$user->SqlGet(Bdd::GetInstance(),$idUser);
    $nom=$userInfo->getNom();
    $prenom=$userInfo->getPrenom();

        $titreNotif = "New Message from " .$prenom.' '.$nom;


    header('location:/Accueil/');
    NotificationsController::SendNotifications($iddest, $typeNotif, $messageFirstWord, $titreNotif);
    return;
}

}

}