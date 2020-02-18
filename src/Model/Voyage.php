<?php

namespace src\Model;
use mysql_xdevapi\Exception;

class Voyage implements \JsonSerializable
{
    private $id;
    private $userid;
    private $fromPays;
    private $FromVille;
    private $toPays;
    private $toVille;
    private $fromDate;
    private $toDate;

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
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return mixed
     */
    public function getFromPays()
    {
        return $this->fromPays;
    }

    /**
     * @param mixed $fromPays
     */
    public function setFromPays($fromPays)
    {
        $this->fromPays = $fromPays;
    }

    /**
     * @return mixed
     */
    public function getFromVille()
    {
        return $this->FromVille;
    }

    /**
     * @param mixed $FromVille
     */
    public function setFromVille($FromVille)
    {
        $this->FromVille = $FromVille;
    }

    /**
     * @return mixed
     */
    public function getToPays()
    {
        return $this->toPays;
    }

    /**
     * @param mixed $toPays
     */
    public function setToPays($toPays)
    {
        $this->toPays = $toPays;
    }

    /**
     * @return mixed
     */
    public function getToVille()
    {
        return $this->toVille;
    }

    /**
     * @param mixed $toVille
     */
    public function setToVille($toVille)
    {
        $this->toVille = $toVille;
    }

    /**
     * @return mixed
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * @param mixed $fromDate
     */
    public function setFromDate($fromDate)
    {
        $this->fromDate = $fromDate;
    }

    /**
     * @return mixed
     */
    public function getToDate()
    {
        return $this->toDate;
    }

    /**
     * @param mixed $toDate
     */
    public function setToDate($toDate)
    {
        $this->toDate = $toDate;
    }

    public function jsonSerialize()
    {
        return [
            'voyage_id' => $this->getId(),
            'voyage_userid' => $this->getUserid(),
            'voyage_fromPays' => $this->getFromPays(),
            'voyage_fromVille' => $this->getFromVille(),
            'voyage_toPays' => $this->getToPays(),
            'voyage_toVille' => $this->getToVille(),
            'voyage_fromDate' => $this->getFromDate(),
            'voyage_toDate' => $this->getToDate(),
        ];
    }

    public function SqlAddVoyage(\PDO $bdd){
        $query=$bdd->prepare('INSERT INTO voyage (USER_ID,VOYAGE_FROM_PAYS,VOYAGE_FROM_VILLE,VOYAGE_DESTINATION_PAYS,VOYAGE_DESTINATION_VILLE,VOYAGE_DATEDEBUT,VOYAGE_DATEFIN) VALUES (:iduser,:frompays,:fromville,:topays,:toville,:fromdate,:todate)');
        $query->execute([
            "iduser"=>$this->getUserid(),
            "frompays"=>$this->getFromPays(),
            "fromville"=>$this->getFromVille(),
            "topays"=>$this->getToPays(),
            "toville"=>$this->getToVille(),
            "fromdate"=>$this->getFromDate(),
            "todate"=>$this->getToDate()
        ]);
    }
}

