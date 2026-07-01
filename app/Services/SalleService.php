<?php

require_once __DIR__ . '/../Repositories/SalleRepository.php';

class SalleService
{
    private $salleRepository;

    public function __construct()
    {
        $this->salleRepository = new SalleRepository();
    }

    // Get all salles
    public function getAllSalles()
    {
        return $this->salleRepository->findAll();
    }

    // Get salle by id
    public function getSalleById($id)
    {
        return $this->salleRepository->findById($id);
    }

    // Create salle
    public function createSalle($nomSalle, $adresse)
    {
        if (empty($nomSalle) || empty($adresse)) {
            throw new Exception("Tous les champs sont obligatoires.");
        }

        return $this->salleRepository->create($nomSalle, $adresse);
    }

    // Update salle
    public function updateSalle($id, $nomSalle, $adresse)
    {
        if (empty($nomSalle) || empty($adresse)) {
            throw new Exception("Tous les champs sont obligatoires.");
        }

        return $this->salleRepository->update(
            $id,
            $nomSalle,
            $adresse
        );
    }

    // Delete salle
    public function deleteSalle($id)
    {
        return $this->salleRepository->delete($id);
    }
}