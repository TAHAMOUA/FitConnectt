<?php

require_once __DIR__ . '/../Repositories/AdherentRepository.php';
require_once __DIR__ . '/../Repositories/AbonnementRepository.php';
require_once __DIR__ . '/../Repositories/SeanceRepository.php';

class AdherentService
{
    private $adherentRepository;
    private $abonnementRepository;
    private $seanceRepository;

    public function __construct()
    {
        $this->adherentRepository = new AdherentRepository();
        $this->abonnementRepository = new AbonnementRepository();
        $this->seanceRepository = new SeanceRepository();
    }

    // Get all members
    public function getAllAdherents()
    {
        return $this->adherentRepository->findAll();
    }

    // Get member by id
    public function getAdherentById($id)
    {
        return $this->adherentRepository->findById($id);
    }

    // Create member
    public function createAdherent(
        $nom,
        $prenom,
        $email,
        $telephone,
        $dateInscription,
        $idSalle
    ) {

        if (empty($nom) || empty($prenom) || empty($email)) {
            throw new Exception("Tous les champs obligatoires doivent être remplis.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Adresse e-mail invalide.");
        }

        return $this->adherentRepository->create(
            $nom,
            $prenom,
            $email,
            $telephone,
            $dateInscription,
            $idSalle
        );
    }

    // Update member
    public function updateAdherent(
        $id,
        $nom,
        $prenom,
        $email,
        $telephone
    ) {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Adresse e-mail invalide.");
        }

        return $this->adherentRepository->update(
            $id,
            $nom,
            $prenom,
            $email,
            $telephone
        );
    }

    // Delete member
    public function deleteAdherent($id)
    {
        if ($this->abonnementRepository->hasSubscriptions($id)) {
            throw new Exception(
                "Impossible de supprimer cet adhérent : il possède un ou plusieurs abonnements."
            );
        }

        if ($this->seanceRepository->hasSeances($id)) {
            throw new Exception(
                "Impossible de supprimer cet adhérent : il possède une ou plusieurs séances."
            );
        }

        return $this->adherentRepository->delete($id);
    }
}