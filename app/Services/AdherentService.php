<?php

require_once __DIR__ . '/../Repositories/AdherentRepository.php';

class AdherentService
{
    private $adherentRepository;

    public function __construct()
    {
        $this->adherentRepository = new AdherentRepository();
    }

    public function getAllAdherents()
    {
        return $this->adherentRepository->findAll();
    }

    public function getAdherentById($id)
    {
        return $this->adherentRepository->findById($id);
    }

    public function createAdherent(
        $nom,
        $prenom,
        $email,
        $telephone,
        $dateInscription,
        $idSalle
    ) {

        if (empty($nom) || empty($prenom) || empty($email)) {
            throw new Exception("All required fields must be filled.");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email.");
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

    public function updateAdherent(
        $id,
        $nom,
        $prenom,
        $email,
        $telephone
    ) {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email.");
        }

        return $this->adherentRepository->update(
            $id,
            $nom,
            $prenom,
            $email,
            $telephone
        );
    }

    public function deleteAdherent($id)
    {
        return $this->adherentRepository->delete($id);
    }
}