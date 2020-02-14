<?php

namespace src\Model;
use mysql_xdevapi\Exception;

class Message implements \JsonSerializable
{
    private $id;
    private $envoyeur;
    private $destinataire;
    private $contenu;
    private $dateenvoi;
    private $isread;

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
    public function getEnvoyeur()
    {
        return $this->envoyeur;
    }

    /**
     * @param mixed $envoyeur
     */
    public function setEnvoyeur($envoyeur)
    {
        $this->envoyeur = $envoyeur;
    }

    /**
     * @return mixed
     */
    public function getDestinataire()
    {
        return $this->destinataire;
    }

    /**
     * @param mixed $destinataire
     */
    public function setDestinataire($destinataire)
    {
        $this->destinataire = $destinataire;
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
    public function getDateenvoi()
    {
        return $this->dateenvoi;
    }

    /**
     * @param mixed $dateenvoi
     */
    public function setDateenvoi($dateenvoi)
    {
        $this->dateenvoi = $dateenvoi;
    }

    /**
     * @return mixed
     */
    public function getIsread()
    {
        return $this->isread;
    }

    /**
     * @param mixed $isread
     */
    public function setIsread($isread)
    {
        $this->isread = $isread;
    }

    public function jsonSerialize()
    {
        return [
            'message_id' => $this->getId(),
            'message_envoyeur'=>$this->getEnvoyeur(),
            'message_destinataire'=>$this->getDestinataire(),
            'message_contenur'=>$this->getContenu(),
            'message_date_envoi'=>$this->getDateenvoi(),
            'message_isread'=>$this->getIsread()
        ];
    }

    public function SqlAddMessage(\PDO $bdd){
        $query = $bdd->prepare('INSERT INTO message (MESSAGE_ENVOYEUR, MESSAGE_DESTINATAIRE, MESSAGE_CONTENU, MESSAGE_DATE_ENVOI) VALUES (:envoyeur, :destinataire, :contenu, :date)');
        $query->execute([
            "envoyeur" => $this->getEnvoyeur(),
            "destinataire" => $this->getDestinataire(),
            "contenu" => $this->getContenu(),
            "date" => $this->getDateenvoi()
        ]);
        return false;
    }

    public function SqlGetMessages(\PDO $bdd,$user1,$user2){
        $query = $bdd->prepare("SELECT * FROM message WHERE (MESSAGE_ENVOYEUR=:uti1 AND MESSAGE_DESTINATAIRE=:uti2)OR(MESSAGE_ENVOYEUR=:uti2 AND MESSAGE_DESTINATAIRE=:uti1) ORDER BY MESSAGE_DATE_ENVOI ASC");
        $query->execute([
            "uti1"=>$user1,
            "uti2"=>$user2
        ]);
        $ArrayMessage=$query->fetchAll();

        $ListMessage=[];

        foreach ($ArrayMessage as $messageSQL){
            $message = new Message();
            $message->setEnvoyeur($messageSQL['MESSAGE_ENVOYEUR']);
            $message->setDestinataire($messageSQL['MESSAGE_DESTINATAIRE']);
            $message->setContenu($messageSQL['MESSAGE_CONTENU']);
            $message->setDateenvoi($messageSQL['MESSAGE_DATE_ENVOI']);
            $message->setIsread($messageSQL['MESSAGE_ISREAD']);

            $ListMessage[]=$message;
        }
        return $ListMessage;
    }

    public function SqlGetConv(\PDO $bdd,$iduser){
        $query = $bdd->prepare("SELECT DISTINCT MESSAGE_DESTINATAIRE,MESSAGE_ENVOYEUR FROM message WHERE MESSAGE_ENVOYEUR=:userid OR MESSAGE_DESTINATAIRE=:userid");
        $query->execute([
            "userid"=>$iduser
        ]);
        $ArrayConv=$query->fetchAll();
        $ListConv=[];
        $ListConv2=[];
        $conv = new Message();
        foreach ($ArrayConv as $messageSQL){
                if ($messageSQL['MESSAGE_DESTINATAIRE'] == $iduser ) {
                    $conv->setEnvoyeur($messageSQL['MESSAGE_ENVOYEUR']);
                    $ListConv[] = $conv->getEnvoyeur();

                }
                if ($messageSQL['MESSAGE_ENVOYEUR'] == $iduser) {
                    $conv->setDestinataire($messageSQL['MESSAGE_DESTINATAIRE']);
                    $ListConv[] = $conv->getDestinataire();
                }
        }
        $ListConv2= array_unique($ListConv);
        return $ListConv2;
    }

}