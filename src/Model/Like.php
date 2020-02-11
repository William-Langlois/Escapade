<?php

namespace src\Model;
use mysql_xdevapi\Exception;

class Like implements \JsonSerializable
{
    private $id;
    private $userlike;
    private $userliked;
    private $date;

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
    public function getUserlike()
    {
        return $this->userlike;
    }

    /**
     * @param mixed $userlike
     */
    public function setUserlike($userlike)
    {
        $this->userlike = $userlike;
    }

    /**
     * @return mixed
     */
    public function getUserliked()
    {
        return $this->userliked;
    }

    /**
     * @param mixed $userliked
     */
    public function setUserliked($userliked)
    {
        $this->userliked = $userliked;
    }

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

    public function jsonSerialize()
    {
        return [
            'like_id' => $this->getId(),
            'like_user' => $this->getUserlike(),
            'liked_user' => $this->getUserliked(),
            'like_date' => $this->getDate(),
        ];
    }

    public function SqlAddLike(\PDO $bdd)
    {
        $query = $bdd->prepare('INSERT INTO likes (id_userlike, id_userliked, like_date) VALUES (:userlike, :userliked,:datelike)');
        $query->execute([
            "userlike" => $this->getUserlike(),
            "userliked" => $this->getUserliked(),
            "datelike" => date("d-m-Y G:i")
        ]);
    }

    public function SqlGetUserLiked(\PDO $bdd , $iduser){
        $query = $bdd->prepare('SELECT * FROM likes WHERE id_userlike=:userid');
        $query->execute([
            'userid'=>$iduser
        ]);
        $ArrayLike=$query->fetchAll();

        $listLike=[];
        foreach ($ArrayLike as $likeSQL){
            $like = new Like();
            $like->setId($likeSQL['id_like']);
            $like->setUserliked($likeSQL['id_userliked']);
            $like->setDate($likeSQL['like_date']);

            $listLike[]=$like;
        }
        return $listLike;
    }

    public function SqlGetUserLike(\PDO $bdd , $iduser){
        $query = $bdd->prepare('SELECT * FROM likes WHERE id_userliked=:userid');
        $query->execute([
            'userid'=>$iduser
        ]);
        $ArrayLike=$query->fetchAll();

        $listLike=[];
        foreach ($ArrayLike as $likeSQL){
            $like = new Like();
            $like->setId($likeSQL['id_like']);
            $like->setUserlike($likeSQL['id_userlike']);
            $like->setDate($likeSQL['like_date']);

            $listLike[]=$like;
        }
        return $listLike;
    }

    public function SqlDeleteLike(\PDO $bdd , $idlike){
        $query = $bdd->prepare('DELETE FROM likes WHERE id_like=:likeid');
        $query->execute([
            'likeid'=>$idlike
        ]);

    }
}
