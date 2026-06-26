<?php

require_once __DIR__ . '/../../config/Database.php';

class AdherentRepository
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Get all members
    
public function findAll()
{
    $sql = "SELECT
                adherent.*,
                salle.nom_salle
            FROM adherent
            INNER JOIN salle
            ON adherent.id_salle = salle.id_salle";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    // Get member by id
    
public function findById($id)
{
    $sql = "SELECT
                adherent.*,
                salle.nom_salle
            FROM adherent
            INNER JOIN salle
            ON adherent.id_salle = salle.id_salle
            WHERE id_adherent = ?";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

    // Create member
    public function create($nom, $prenom, $email, $telephone, $dateInscription, $idSalle)
    {
        $sql = "INSERT INTO adherent
                (nom, prenom, email, telephone, date_inscription, id_salle)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $nom,
            $prenom,
            $email,
            $telephone,
            $dateInscription,
            $idSalle
        ]);
    }

    // Update member
    public function update($id, $nom, $prenom, $email, $telephone)
    {
        $sql = "UPDATE adherent
                SET nom = ?, prenom = ?, email = ?, telephone = ?
                WHERE id_adherent = ?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $nom,
            $prenom,
            $email,
            $telephone,
            $id
        ]);
    }

    // Delete member
    public function delete($id)
    {
        $sql = "DELETE FROM adherent WHERE id_adherent = ?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$id]);
    }
    public function hasSubscriptions($idAdherent)
{
    $sql = "SELECT COUNT(*) FROM abonnement
            WHERE id_adherent = ?";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$idAdherent]);

    return $stmt->fetchColumn() > 0;
}
} 