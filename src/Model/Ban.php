<?php

namespace src\Model;
use mysql_xdevapi\Exception;

class Ban implements \JsonSerializable
{
    private $id;
    private $admin;
    private $concerne;
    private $raison;
    private $datedebut;
    private $datefin;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @param mixed $admin
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
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
    public function getRaison()
    {
        return $this->raison;
    }

    /**
     * @param mixed $raison
     */
    public function setRaison($raison)
    {
        $this->raison = $raison;
    }

    /**
     * @return mixed
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * @param mixed $datedebut
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return mixed
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param mixed $datefin
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }

    public function jsonSerialize()
    {
        return [
            'ban_id' => $this->getId(),
            'ban_admin'=>$this->getAdmin(),
            'ban_concerne'=>$this->getConcerne(),
            'ban_raison'=>$this->getRaison(),
            'ban_date_debut'=>$this->getDatedebut(),
            'ban_date_fin'=>$this->getDatefin()
        ];
    }
    public function SqlAddBan(\PDO $bdd){
        $query = $bdd->prepare('INSERT INTO bannissement (ban_admin, ban_concerne, ban_raison, ban_datedebut, ban_datefin) VALUES (:admin,:concerne,:raison,:datedebut,:datefin)');
        $query->execute([
            "admin" => $this->getAdmin(),
            "concerne" => $this->getConcerne(),
            "raison" => $this->getRaison(),
            "datedebut" => date("Y-m-d G:i:s"),
            "datefin"=>$this->getDatefin()
        ]);
    }
    public function SqlGetBan(\PDO $bdd,$iduser){
        $query = $bdd->prepare('SELECT * FROM bannissement WHERE BAN_CONCERNE=:iduser ORDER BY BAN_DATEDEBUT DESC LIMIT 1');
        $query->execute([
            'iduser'=>$iduser
        ]);
        $bans=$query->fetchAll();
        $lastban=[];
        foreach ($bans as $banSql){
            $ban=new Ban();
            $ban->setId($banSql['BAN_ID']);
            $ban->setDatedebut($banSql['BAN_DATEDEBUT']);
            $ban->setDatefin($banSql['BAN_DATEFIN']);
            $ban->setRaison($banSql['BAN_RAISON']);

            $lastban[]=$ban;
        }
        return $lastban;
    }
}
