<?php

namespace src\Model;
use mysql_xdevapi\Exception;

class CS implements \JsonSerializable
{
    private $id;
    private $nom;
    private $importance;

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

    /**
     * @return mixed
     */
    public function getImportance()
    {
        return $this->importance;
    }

    /**
     * @param mixed $importance
     */
    public function setImportance($importance)
    {
        $this->importance = $importance;
    }

    public function jsonSerialize()
    {
        return [
            'cs_id' => $this->getId(),
            'cs_nom' => $this->getNom(),
            'cs_importance' => $this->getImportance()
        ];
    }

    public function GetCS(\PDO $bdd){
        $query=$bdd->prepare('SELECT * FROM categorie_signalement');
        $query->execute();
        $ArrayCS=$query->fetchAll();

        $ListCS=[];
        foreach ($ArrayCS as $CSSql) {
            $CS=new CS();
            $CS->setId($CSSql['CS_ID']);
            $CS->setNom($CSSql['CS_NOM']);
            $CS->setImportance($CSSql['CS_IMPORTANCE']);

            $ListCS[]=$CS;
        }
        return $ListCS;
    }
}
