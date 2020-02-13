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
    public function getManages()
    {
        return $this->manages;
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
        $query = $bdd->prepare('INSERT INTO signalement (CS_ID, SIGNALEMENT_SOUMETTEUR, SIGNALEMENT_CONCERNE, SIGNALEMENT_CONTEXT) VALUES (:csid, :soumetteur, :concerne, :context)');
        $query->execute([
            "soumetteur" => $this->getSoumetteur(),
            "concerne" => $this->getConcerne(),
            "context" => $this->getContext(),
            "idcs" => $this->getIdcs(),


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
            $signalement->setConcerne($signalementSql['SIGNALEMENT_CONCERNE']);
            $signalement->setSoumetteur($signalementSql['SIGNALEMENT_SOUMETTEUR']);
            $signalement->setContext($signalementSql['SIGNALEMENT_CONTEXT']);
            $signalement->setManaged($signalementSql['SIGNALEMENT_MANAGED']);
            $signalement->setIdcs($signalementSql['CS_ID']);

            $listSignalement[]=$signalement;
        }
        return $listSignalement;
    }



}