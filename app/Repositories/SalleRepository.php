<?php

require_once __DIR__ . '/../../config/Database.php';

class SalleRepository
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Get all salles
    public function findAll()
    {
        $sql = "SELECT * FROM salle";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get salle by id
    public function findById($id)
    {
        $sql = "SELECT * FROM salle WHERE id_salle = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create salle
    public function create($nomSalle, $adresse)
    {
        $sql = "INSERT INTO salle (nom_salle, adresse)
                VALUES (?, ?)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $nomSalle,
            $adresse
        ]);
    }

    // Update salle
    public function update($id, $nomSalle, $adresse)
    {
        $sql = "UPDATE salle
                SET nom_salle = ?, adresse = ?
                WHERE id_salle = ?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $nomSalle,
            $adresse,
            $id
        ]);
    }

    // Delete salle
    public function delete($id)
    {
        $sql = "DELETE FROM salle
                WHERE id_salle = ?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$id]);
    }
}