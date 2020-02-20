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
        UserController::AdminNeed();
        $Sign = new Signalement();
        $Signalements = $Sign->SqlGetSignalementforUser(Bdd::GetInstance(), $idUser);
        $soumetteurInfo=[];
        $soumetteurs=[];

        foreach ($Signalements as $oneSignalement){
            $soumetteurid[]=$oneSignalement->getSoumetteur();
        }
        $soumetteuridunique=array_unique($soumetteurid);
        foreach ($soumetteuridunique as $onesoumetteur){
            $user=new User();
            $soumetteurInfo[]=$user->SqlGet(Bdd::GetInstance(),$onesoumetteur);
        }
        $userr=new User();
        $concerne=$userr->SqlGet(Bdd::GetInstance(),$idUser);


        return $this->twig->render('Signalement/Signalement.html.twig', [
            "Signalements" => $Signalements,
            "soumetteurs"=>$soumetteurInfo,
            "Concerne"=>$concerne
        ]);

    }
    public function ShowOneSignalement($idSignalement)
    {
        UserController::AdminNeed();
        $sign=new Signalement();
        $sign->SetSignalementManaged(Bdd::GetInstance(),$idSignalement);
        $signalement=$sign->GetOneSignalement(Bdd::GetInstance(),$idSignalement);

        $user=new User();
        $soumetteur=$user->SqlGet(Bdd::GetInstance(),$signalement->getSoumetteur());
        $userr=new User();
        $concerne=$userr->SqlGet(Bdd::GetInstance(),$signalement->getConcerne());

        return $this->twig->render('Signalement/OneSignalement.html.twig', [
            "Signalement" => $signalement,
            "Soumetteur" => $soumetteur,
            "Concerne" => $concerne
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
        $Sign->setDate(date("Y-m-d G:i:s"));
        $Sign->SqlAddSignalement(Bdd::GetInstance());

        header('location:/Profile/'.$concerne);

    }
}