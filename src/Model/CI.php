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
        $query=$bdd->prepare('UPDATE centre_interet SET USER_ID=:userid,CI_NOM=:nom WHERE CI_NUM=:num');
        $query->execute([
            "userid"=>$this->getUserid(),
            "nom"=>$this->getNom(),
            "num"=>$this->getNum()
        ]);
    }

    public function SqlAddCIs(\PDO $bdd){
        try {

            $prequery = $bdd->prepare('DELETE FROM centre_interet WHERE USER_ID=:iduser');
            $prequery->execute([
                "iduser" => $this->getUserid()
            ]);
            for($i=1;$i<=12;$i++) {
                $query = $bdd->prepare('INSERT INTO centre_interet (USER_ID,CI_NUM) VALUES (:userid,:num)');
                $query->execute([
                    "userid" => $this->getUserid(),
                    "num" => $i
                ]);
            }
        }
        catch(\Exception $e) {
            for ($i = 1; $i <= 12; $i++) {
                $query = $bdd->prepare('INSERT INTO centre_interet (USER_ID,CI_NUM) VALUES (:userid,:num)');
                $query->execute([
                    "userid" => $this->getUserid(),
                    "num" => $i
                ]);
            }
        }
    }
}
