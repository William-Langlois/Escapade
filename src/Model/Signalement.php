<?php

namespace src\Model;
use mysql_xdevapi\Exception;

class Signalement implements \JsonSerializable
{
    private $signid;
    private $soumetteur;
    private $concerne;
    private $managed;
    private $context;
    private $idcs;
    private $date;

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getSignid()
    {
        return $this->signid;
    }

    /**
     * @param mixed $signid
     */
    public function setSignid($signid)
    {
        $this->signid = $signid;
    }

    /**
     * @return mixed
     */
    public function getSoumetteur()
    {
        return $this->soumetteur;
    }

    /**
     * @param mixed $soumetteur
     */
    public function setSoumetteur($soumetteur)
    {
        $this->soumetteur = $soumetteur;
    }

    /**
     * @return mixed
     */
    public function getConcerne()
    {
        return $this->concerne;
    }

    /**
     * @param mixed $concerne
     */
    public function setConcerne($concerne)
    {
        $this->concerne = $concerne;
    }

    /**
     * @return mixed
     */
    public function getManaged()
    {
        return $this->managed;
    }

    /**
     * @param mixed $managed
     */
    public function setManaged($managed)
    {
        $this->managed = $managed;
    }

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param mixed $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @return mixed
     */
    public function getIdcs()
    {
        return $this->idcs;
    }

    /**
     * @param mixed $idcs
     */
    public function setIdcs($idcs)
    {
        $this->idcs = $idcs;
    }

    public function jsonSerialize()
    {
        return [
            'Signalement_id' => $this->getId(),
            'Signalement_idcs' => $this->getIdcs(),
            'Signalement_soumetteur'=>$this->getSoumetteur(),
            'Signalement_concerne'=>$this->getConcerne(),
            'Signalement_managed'=>$this->getManaged(),
            'Signalement_context'=>$this->getContext()
        ];
    }

      public function SqlAddSignalement(\PDO $bdd){
        $query = $bdd->prepare('INSERT INTO signalement (SIGNALEMENT_SOUMETTEUR, SIGNALEMENT_CONCERNE, SIGNALEMENT_CONTEXT ,CS_ID,SIGNALEMENT_DATE) VALUES (:soumetteur, :concerne, :context,:idcs,:datecrea)');
        $query->execute([
            "soumetteur" => $this->getSoumetteur(),
            "concerne" => $this->getConcerne(),
            "idcs"=>$this->getIdcs(),
            "context" => $this->getContext(),
            "datecrea"=> $this->getDate()
        ]);

    }
    public function GetOneSignalement(\PDO $bdd, $idsign){
        $query = $bdd->prepare('SELECT * FROM signalement WHERE SIGNALEMENT_ID=:idsign');
        $query->execute([
            "idsign"=>$idsign
        ]);
        $ArraySignalement=$query->fetchAll();
        $listSignalement=null;
        foreach($ArraySignalement as $signalementSql){
            $signalement=new Signalement();
            $signalement->setSignid($signalementSql['SIGNALEMENT_ID']);
            $signalement->setConcerne($signalementSql['SIGNALEMENT_CONCERNE']);
            $signalement->setSoumetteur($signalementSql['SIGNALEMENT_SOUMETTEUR']);
            $signalement->setContext($signalementSql['SIGNALEMENT_CONTEXT']);
            $signalement->setManaged($signalementSql['SIGNALEMENT_MANAGED']);
            $signalement->setDate($signalementSql['SIGNALEMENT_DATE']);
            $signalement->setIdcs($signalementSql['CS_ID']);

            $listSignalement=$signalement;
        }
        return $listSignalement;
    }
    public function SetSignalementManaged(\PDO $bdd,$idsign){
        $query=$bdd->prepare('UPDATE signalement SET SIGNALEMENT_MANAGED=1 WHERE SIGNALEMENT_ID=:signid');
        $query->execute([
            "signid"=>$idsign
        ]);
    }

    public function SqlGetSignalementforUser(\PDO $bdd,$iduser){
        $query = $bdd->prepare('SELECT * FROM signalement WHERE SIGNALEMENT_CONCERNE=:userid');
        $query->execute([
            "userid"=>$iduser
        ]);
        $ArraySignalement=$query->fetchAll();
        $listSignalement=[];
        foreach($ArraySignalement as $signalementSql){
            $signalement=new Signalement();
            $signalement->setSignid($signalementSql['SIGNALEMENT_ID']);
            $signalement->setConcerne($signalementSql['SIGNALEMENT_CONCERNE']);
            $signalement->setSoumetteur($signalementSql['SIGNALEMENT_SOUMETTEUR']);
            $signalement->setContext($signalementSql['SIGNALEMENT_CONTEXT']);
            $signalement->setManaged($signalementSql['SIGNALEMENT_MANAGED']);
            $signalement->setDate($signalementSql['SIGNALEMENT_DATE']);
            $signalement->setIdcs($signalementSql['CS_ID']);

            $listSignalement[]=$signalement;
        }
        return $listSignalement;
    }



}