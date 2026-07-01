<?php

require_once __DIR__ . '/../Repositories/SeanceRepository.php';
require_once __DIR__ . '/../Repositories/AbonnementRepository.php';

class SeanceService
{
    private $seanceRepository;
    private $abonnementRepository;

    public function __construct()
    {
        $this->seanceRepository = new SeanceRepository();
        $this->abonnementRepository = new AbonnementRepository();
    }

    // Get all sessions
    public function getAllSeances()
    {
        return $this->seanceRepository->findAll();
    }

    // Get session by id
    public function getSeanceById($id)
    {
        return $this->seanceRepository->findById($id);
    }

    // Create session
    public function createSeance(
        $dateSeance,
        $typeActivite,
        $duree,
        $equipementUtilise,
        $idAdherent,
        $idSalle
    ) {

        $typesAutorises = [
            'Musculation',
            'Cardio',
            'CrossFit'
        ];

        if (!in_array($typeActivite, $typesAutorises)) {
            throw new Exception("Type d'activité invalide.");
        }

        if ($duree <= 0) {
            throw new Exception("La durée doit être supérieure à 0.");
        }

        $abonnementActif = $this->abonnementRepository
            ->hasActiveSubscription($idAdherent);

        if (!$abonnementActif) {
            throw new Exception(
                "Impossible d'enregistrer la séance : aucun abonnement actif."
            );
        }

        return $this->seanceRepository->create(
            $dateSeance,
            $typeActivite,
            $duree,
            $equipementUtilise,
            $idAdherent,
            $idSalle
        );
    }

    // Update session
    public function updateSeance(
        $id,
        $dateSeance,
        $typeActivite,
        $duree,
        $equipementUtilise
    ) {

        $typesAutorises = [
            'Musculation',
            'Cardio',
            'CrossFit'
        ];

        if (!in_array($typeActivite, $typesAutorises)) {
            throw new Exception("Type d'activité invalide.");
        }

        if ($duree <= 0) {
            throw new Exception("La durée doit être supérieure à 0.");
        }

        return $this->seanceRepository->update(
            $id,
            $dateSeance,
            $typeActivite,
            $duree,
            $equipementUtilise
        );
    }

    // Delete session
    public function deleteSeance($id)
    {
        return $this->seanceRepository->delete($id);
    }
}