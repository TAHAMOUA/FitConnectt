<?php

class Seance
{
    private $id;
    private $dateSeance;
    private $typeActivite;
    private $duree;
    private $equipement;
    private $idAdherent;
    private $idSalle;

    public function __construct(
        $id,
        $dateSeance,
        $typeActivite,
        $duree,
        $equipement,
        $idAdherent,
        $idSalle
    ) {
        $this->id = $id;
        $this->dateSeance = $dateSeance;
        $this->typeActivite = $typeActivite;
        $this->duree = $duree;
        $this->equipement = $equipement;
        $this->idAdherent = $idAdherent;
        $this->idSalle = $idSalle;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDateSeance()
    {
        return $this->dateSeance;
    }

    public function getTypeActivite()
    {
        return $this->typeActivite;
    }

    public function getDuree()
    {
        return $this->duree;
    }

    public function getEquipement()
    {
        return $this->equipement;
    }

    public function getIdAdherent()
    {
        return $this->idAdherent;
    }

    public function getIdSalle()
    {
        return $this->idSalle;
    }
}