<?php
namespace src\Controller;

use src\Model\Bdd;
use src\Model\Notifications;
use src\Model\User;

class NotificationsController extends AbstractController
{
    public function ShowNotification($idUser)
    {
        UserController::idNeed($idUser);
        $Notif = new Notifications();
        $Notifications = $Notif->SqlGetNotif(Bdd::GetInstance(), $idUser);

        return $this->twig->render('Notifications/Notifications.html.twig', [
            "Notification" => $Notifications
        ]);

    }


    public static function SendNotifications($idUser, $type, $contenu, $titre)
    {

        $Notif = new Notifications();
        $Notif->setIduser($idUser);
        $Notif->setTitre($titre);
        $Notif->setContenu($contenu);
        $Notif->setType($type);
        $Notif->setCreatime(date("Y-m-d H:i:s"));
        $Notif->SqlAddNotification(Bdd::GetInstance());

    }


}