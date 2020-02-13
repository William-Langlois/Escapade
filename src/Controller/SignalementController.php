<?php
namespace src\Controller;

use src\Model\Bdd;
use src\Model\Signalement;
use src\Model\User;

class SignalementController extends AbstractController
{

    public function ShowSignalement($idUser)
    {
        UserController::idNeed($idUser);
        $Sign = new Signalement();
        $Signalements = $Sign->SqlGetSignalementforUser(Bdd::GetInstance(), $idUser);

        return $this->twig->render('Signalement/Signalement.html.twig', [
            "Signalements" => $Signalements
        ]);

    }


    public static function SendSignalement($signid, $soumetteur, $concerne, $managed, $context)
    {

        $Sign = new Signalement();
        $Sign->setSignId($signid);
        $Sign->setSoumetteur($soumetteur);
        $Sign->setConcerne($concerne);
        $Sign->setManaged($managed);
        $Sign->setContext($context);
        $Sign->SqlAddSignalement(Bdd::GetInstance());

    }
}