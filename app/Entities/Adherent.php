<?php

class Adherent
{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $dateInscription;
    private $idSalle;

    public function __construct(
        $id,
        $nom,
        $prenom,
        $email,
        $telephone,
        $dateInscription,
        $idSalle
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->dateInscription = $dateInscription;
        $this->idSalle = $idSalle;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    public function getIdSalle()
    {
        return $this->idSalle;
    }
}