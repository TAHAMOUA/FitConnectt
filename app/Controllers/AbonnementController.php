<?php

require_once __DIR__ . '/../Services/AbonnementService.php';

class AbonnementController
{
    private $abonnementService;

    public function __construct()
    {
        $this->abonnementService = new AbonnementService();
    }

    // Get all abonnements
    public function index()
    {
        return $this->abonnementService->getAllAbonnements();
    }

    // Get abonnement by id
    public function show($id)
    {
        return $this->abonnementService->getAbonnementById($id);
    }

    // Create abonnement
    public function store(
        $typeAbonnement,
        $dateDebut,
        $dateFin,
        $idAdherent
    ) {
        return $this->abonnementService->createAbonnement(
            $typeAbonnement,
            $dateDebut,
            $dateFin,
            $idAdherent
        );
    }

    // Update abonnement
    public function update(
        $id,
        $typeAbonnement,
        $dateDebut,
        $dateFin,
        $idAdherent
    ) {
        return $this->abonnementService->updateAbonnement(
            $id,
            $typeAbonnement,
            $dateDebut,
            $dateFin,
            $idAdherent
        );
    }

    // Delete abonnement
    public function destroy($id)
    {
        return $this->abonnementService->deleteAbonnement($id);
    }
}