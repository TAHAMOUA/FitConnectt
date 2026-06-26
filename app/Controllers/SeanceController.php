<?php

require_once __DIR__ . '/../Services/SeanceService.php';

class SeanceController
{
    private $seanceService;

    public function __construct()
    {
        $this->seanceService = new SeanceService();
    }

    // Get all seances
    public function index()
    {
        return $this->seanceService->getAllSeances();
    }

    // Get seance by id
    public function show($id)
    {
        return $this->seanceService->getSeanceById($id);
    }

    // Create seance
    public function store(
        $dateSeance,
        $typeActivite,
        $duree,
        $equipementUtilise,
        $idAdherent,
        $idSalle
    ) {
        return $this->seanceService->createSeance(
            $dateSeance,
            $typeActivite,
            $duree,
            $equipementUtilise,
            $idAdherent,
            $idSalle
        );
    }

    // Update seance
    public function update(
        $id,
        $dateSeance,
        $typeActivite,
        $duree,
        $equipementUtilise
    ) {
        return $this->seanceService->updateSeance(
            $id,
            $dateSeance,
            $typeActivite,
            $duree,
            $equipementUtilise
        );
    }

    // Delete seance
    public function destroy($id)
    {
        return $this->seanceService->deleteSeance($id);
    }
}