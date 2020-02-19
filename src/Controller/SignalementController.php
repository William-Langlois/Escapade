<?php
namespace src\Controller;

use src\Model\Bdd;
use src\Model\CS;
use src\Model\Signalement;
use src\Model\User;

class SignalementController extends AbstractController
{

    public function ShowSignalement($idUser)
    {
        $Sign = new Signalement();
        $Signalements = $Sign->SqlGetSignalementforUser(Bdd::GetInstance(), $idUser);
        return $this->twig->render('Signalement/Signalement.html.twig', [
            "Signalements" => $Signalements
        ]);

    }

    public function showSendSignalement($soumetteur,$idconcerne){
    UserController::idNeed($soumetteur);
    $cs=new CS();
    $listCS=$cs->GetCS(Bdd::GetInstance());
    $user=new User();
    $concerne=$user->SqlGet(Bdd::GetInstance(),$idconcerne);

        return $this->twig->render('Signalement/Signalementform.html.twig', [
            "listcs"=>$listCS,
            "concerne"=>$concerne
        ]);
    }


    public function SendSignalement($soumetteur,$concerne)
    {
        UserController::idNeed($soumetteur);

        $Sign = new Signalement();
        $Sign->setSoumetteur($soumetteur);
        $Sign->setIdcs($_POST['categorie']);
        $Sign->setConcerne($concerne);
        $Sign->setContext($_POST['raison']);
        $Sign->SqlAddSignalement(Bdd::GetInstance());

        header('location:/Profile/'.$concerne);

    }
}