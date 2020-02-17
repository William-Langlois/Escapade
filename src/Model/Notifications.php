<?php

namespace src\Model;
use mysql_xdevapi\Exception;

class Notifications implements \JsonSerializable
{
    private $id;
    private $iduser;
    private $titre;
    private $contenu;
    private $type;
    private $creatime;
    private $viewtime;
    private $isviewed;
    private $photorepo;
    private $photonom;

    /**
     * @return mixed
     */
    public function getPhotorepo()
    {
        return $this->photorepo;
    }

    /**
     * @param mixed $photorepo
     */
    public function setPhotorepo($photorepo)
    {
        $this->photorepo = $photorepo;
    }

    /**
     * @return mixed
     */
    public function getPhotonom()
    {
        return $this->photonom;
    }

    /**
     * @param mixed $photonom
     */
    public function setPhotonom($photonom)
    {
        $this->photonom = $photonom;
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
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param mixed $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getCreatime()
    {
        return $this->creatime;
    }

    /**
     * @param mixed $creatime
     */
    public function setCreatime($creatime)
    {
        $this->creatime = $creatime;
    }

    /**
     * @return mixed
     */
    public function getViewtime()
    {
        return $this->viewtime;
    }

    /**
     * @param mixed $viewtime
     */
    public function setViewtime($viewtime)
    {
        $this->viewtime = $viewtime;
    }

    /**
     * @return mixed
     */
    public function getIsviewed()
    {
        return $this->isviewed;
    }

    /**
     * @param mixed $isviewed
     */
    public function setIsviewed($isviewed)
    {
        $this->isviewed = $isviewed;
    }

    public function jsonSerialize()
    {
        return [
            'notifications_id' => $this->getId(),
            'notifications_iduser' => $this->getIduser(),
            'notifications_titre' => $this->getTitre(),
            'notifications_contenu' => $this->getContenu(),
            'notifications_type' => $this->getType(),
            'notifications_creatime' => $this->getCreatime(),
            'notifications_viewtime' => $this->getViewtime(),
            'notifications_isviewed' => $this->getIsviewed(),
        ];
    }

    public function SqlAddNotification(\PDO $bdd)
    {
        $query = $bdd->prepare('INSERT INTO notification (USER_ID, NOTIFICATION_TITRE, NOTIFICATION_CONTENU, NOTIFICATION_TYPE, NOTIFICATION_CREATIME,NOTIFICATION_PHOTOREPO,NOTIFICATION_PHOTONOM) VALUES (:userid, :titre, :contenu, :typenotif, :creatime,:photorepo,:photonom)');
        $query->execute([
            "userid" => $this->getIduser(),
            "titre" => $this->getTitre(),
            "contenu" => $this->getContenu(),
            "creatime" => $this->getCreatime(),
            "photorepo" => $this->getPhotorepo(),
            "photonom" => $this->getPhotonom(),
            "typenotif" => $this->getType()
        ]);


    }

    public function SqlGetNotif(\PDO $bdd, $iduser)
    {
        $query = $bdd->prepare('SELECT * FROM notification WHERE USER_ID = :iduser');
        $query->execute([
            "iduser" => $iduser
        ]);

        $arrayNotif =$query->fetchAll();

        $ListNotif =[];
        foreach ($arrayNotif as $NotifSql){
            $Notif = new Notifications();
            $Notif->setId($NotifSql['NOTIFICATION_ID']);
            $Notif->setIduser($NotifSql['USER_ID']);
            $Notif->setTitre($NotifSql['NOTIFICATION_TITRE']);
            $Notif->setType($NotifSql['NOTIFICATION_TYPE']);
            $Notif->setContenu($NotifSql['NOTIFICATION_CONTENU']);
            $Notif->setCreatime($NotifSql['NOTIFICATION_CREATIME']);
            $Notif->setViewtime($NotifSql['NOTIFICATION_VIEWTIME']);
            $Notif->setIsviewed($NotifSql['NOTIFICATION_ISVIEWED']);
            $Notif->setPhotorepo($NotifSql['NOTIFICATION_PHOTOREPO']);
            $Notif->setPhotonom($NotifSql['NOTIFICATION_PHOTONOM']);


            $ListNotif[]=$Notif;
        }
        return $ListNotif;
    }



}