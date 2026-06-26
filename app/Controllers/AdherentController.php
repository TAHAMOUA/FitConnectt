<?php

require_once __DIR__ . '/../Services/AdherentService.php';

class AdherentController
{
    private $adherentService;

    public function __construct()
    {
        $this->adherentService = new AdherentService();
    }

    // Get all adherents
    public function index()
    {
        return $this->adherentService->getAllAdherents();
    }

    // Get adherent by id
    public function show($id)
    {
        return $this->adherentService->getAdherentById($id);
    }

    // Create adherent
    public function store(
        $nom,
        $prenom,
        $email,
        $telephone,
        $dateInscription,
        $idSalle
    ) {
        return $this->adherentService->createAdherent(
            $nom,
            $prenom,
            $email,
            $telephone,
            $dateInscription,
            $idSalle
        );
    }

    // Update adherent
    public function update(
        $id,
        $nom,
        $prenom,
        $email,
        $telephone,
        $dateInscription,
        $idSalle
    ) {
        return $this->adherentService->updateAdherent(
            $id,
            $nom,
            $prenom,
            $email,
            $telephone,
            $dateInscription,
            $idSalle
        );
    }

    // Delete adherent
    public function destroy($id)
    {
        return $this->adherentService->deleteAdherent($id);
    }
}