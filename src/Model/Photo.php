<?php

namespace src\Model;
use mysql_xdevapi\Exception;

class Photo implements \JsonSerializable
{
    private $id;
    private $userid;
    private $nom;
    private $repository;
    private $categorie;

    /**
     * @return mixed
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param mixed $repository
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;
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

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    public function jsonSerialize()
    {
        return [
            'photo_id' => $this->getId(),
            'photo_userid' => $this->getUserid(),
            'photo_nom' => $this->getNom(),
            'photo_repository' => $this->getUrl(),
            'photo_categorie' => $this->getCategorie()
        ];
    }

    public function SqlAddPhoto(\PDO $bdd){
        $query=$bdd->prepare('INSERT INTO photo (USER_ID, PHOTO_NOM, PHOTO_REPOSITORY, PHOTO_CATEGORIE) VALUES (:userid,:nom,:repository,:categorie)');
        $query->execute([
           "userid"=>$this->getUserid(),
            "nom"=>$this->getNom(),
            "repository"=>$this->getRepository(),
            "categorie"=>$this->getCategorie()
        ]);
    }

}
