<?php

require_once __DIR__ . '/../Services/SalleService.php';

class SalleController
{
    private $salleService;

    public function __construct()
    {
        $this->salleService = new SalleService();
    }

    // Get all salles
    public function index()
    {
        return $this->salleService->getAllSalles();
    }

    // Get salle by id
    public function show($id)
    {
        return $this->salleService->getSalleById($id);
    }

    // Create salle
    public function store($nomSalle, $adresse)
    {
        return $this->salleService->createSalle(
            $nomSalle,
            $adresse
        );
    }

    // Update salle
    public function update($id, $nomSalle, $adresse)
    {
        return $this->salleService->updateSalle(
            $id,
            $nomSalle,
            $adresse
        );
    }

    // Delete salle
    public function destroy($id)
    {
        return $this->salleService->deleteSalle($id);
    }
}