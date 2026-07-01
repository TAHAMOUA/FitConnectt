<?php

require_once __DIR__ . '/../Repositories/AbonnementRepository.php';

class AbonnementService
{
    private $abonnementRepository;

    public function __construct()
    {
        $this->abonnementRepository = new AbonnementRepository();
    }

    public function getAllAbonnements()
    {
        return $this->abonnementRepository->findAll();
    }

    public function getAbonnementById($id)
    {
        return $this->abonnementRepository->findById($id);
    }

    public function createAbonnement(
        $type,
        $dateDebut,
        $dateFin,
        $idAdherent
    ) {

        $typesAutorises = [
            'Mensuel',
            'Trimestriel',
            'Annuel'
        ];

        if (!in_array($type, $typesAutorises)) {
            throw new Exception("Type d'abonnement invalide.");
        }

        if ($dateFin <= $dateDebut) {
            throw new Exception(
                "La date de fin doit être supérieure à la date de début."
            );
        }

        $abonnementActif = $this->abonnementRepository
            ->hasActiveSubscription($idAdherent);

        if ($abonnementActif) {
            throw new Exception(
                "Cet adhérent possède déjà un abonnement actif."
            );
        }

        return $this->abonnementRepository->create(
            $type,
            $dateDebut,
            $dateFin,
            $idAdherent
        );
    }

    public function updateAbonnement(
        $id,
        $type,
        $dateDebut,
        $dateFin
    ) {

        $typesAutorises = [
            'Mensuel',
            'Trimestriel',
            'Annuel'
        ];

        if (!in_array($type, $typesAutorises)) {
            throw new Exception("Type d'abonnement invalide.");
        }

        if ($dateFin <= $dateDebut) {
            throw new Exception(
                "La date de fin doit être supérieure à la date de début."
            );
        }

        return $this->abonnementRepository->update(
            $id,
            $type,
            $dateDebut,
            $dateFin
        );
    }

    public function deleteAbonnement($id)
    {
        return $this->abonnementRepository->delete($id);
    }
}