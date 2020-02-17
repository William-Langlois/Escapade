<?php
namespace src\Controller;

use src\Model\Bdd;
use src\Model\Contenu;
use src\Model\Like;
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

    $like=new Like();
    $convdispbylike=$like->SqlGetUserLike(Bdd::GetInstance(),$idUser);
    $infoUserlike=[];
    foreach ($convdispbylike as $otherconv){
        $id=$otherconv->getUserlike();
        $user=new User();
        $infoUserlike[]=$user->SqlGet(Bdd::GetInstance(),$id);
    }
    $userrr=new User();
    $myinfo=$userrr->SqlGet(Bdd::GetInstance(),$idUser);

    return $this->twig->render('Chat/chat.html.twig',[
        "convdisp"=>$infoUser,
        "convdisplike"=>$infoUserlike,
        "myinfo"=>$myinfo
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
    $like=new Like();
    $convdispbylike=$like->SqlGetUserLike(Bdd::GetInstance(),$idUser);
    $infoUserLike=[];

    foreach ($convdispbylike as $otherconv){
        $id=$otherconv->getUserlike();
        $user=new User();
        $infoUserLike[]=$user->SqlGet(Bdd::GetInstance(),$id);
    }

    $userr = new User();
    $activeconvinfo = $userr->SqlGet(Bdd::GetInstance(), $iddest);

    $ActiveMessages = new Message();
    $ActiveConv = $ActiveMessages->SqlGetMessages(Bdd::GetInstance(), $idUser, $iddest);

    $userrr=new User();
        $myinfo=$userrr->SqlGet(Bdd::GetInstance(),$idUser);



    return $this->twig->render('Chat/chat.html.twig',[
        "convdisp"=>$infoUser,
        "convdisplike"=>$infoUserLike,
        "activeConvMessage" => $ActiveConv,
        "activeconvinfo"=>$activeconvinfo,
        "iddest"=>$iddest,
        "myinfo"=>$myinfo
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

        $photorepo=$userInfo->getPhotoRepo();
        $photonom=$userInfo->getPhotoNom();

    NotificationsController::SendNotifications($iddest, $typeNotif, $messageFirstWord, $titreNotif,$photorepo,$photonom);
    header('location:/Chat/'.$idUser.'/'.$iddest);
    return;
}

}

}