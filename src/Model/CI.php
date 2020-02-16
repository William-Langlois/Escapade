<?php

namespace src\Model;
use mysql_xdevapi\Exception;

class CI implements \JsonSerializable
{
    private $id;
    private $userid;
    private $nom;
    private $num;

    /**
     * @return mixed
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * @param mixed $num
     */
    public function setNum($num)
    {
        $this->num = $num;
    }



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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }




    public function jsonSerialize()
    {
        return [
            'ci_id' => $this->getId(),
            'ci_userid' => $this->getUserid(),
            'ci_nom' => $this->getNom(),
        ];
    }

    public function GetUserCI(\PDO $bdd,$iduser){
        $query = $bdd->prepare('SELECT * FROM centre_interet WHERE USER_ID=:userid');
        $query->execute([
            "userid"=>$iduser
        ]);

        $CIArray=$query->fetchAll();
        $CIList=[];
        foreach ($CIArray as $CISql){
            $ci=new CI();
            $ci->setId($CISql['CI_ID']);
            $ci->setUserid($CISql['USER_ID']);
            $ci->setNum($CISql['CI_NUM']);
            $ci->setNom($CISql['CI_NOM']);


            $CIList[]=$ci;
        }
        return $CIList;
    }

    public function SqlChangeCI(\PDO $bdd){
        $query=$bdd->prepare('UPDATE centre_interet set');
        $query->execute([
            "userid"=>$this->getUserid(),
            "nom"=>$this->getNom()
        ]);
    }
}
