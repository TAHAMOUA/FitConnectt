<?php

class Salle
{
    private $id;
    private $nom;
    private $adresse;

    public function __construct($id, $nom, $adresse)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->adresse = $adresse;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }
}