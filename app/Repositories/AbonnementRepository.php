<?php

require_once __DIR__ . '/../../config/Database.php';

class AbonnementRepository
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

   public function findAll()
{
    $sql = "SELECT
                abonnement.*,
                adherent.nom,
                adherent.prenom
            FROM abonnement
            INNER JOIN adherent
            ON abonnement.id_adherent = adherent.id_adherent";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    // Get subscription by id
   public function findById($id)
{
    $sql = "SELECT
                abonnement.*,
                adherent.nom,
                adherent.prenom
            FROM abonnement
            INNER JOIN adherent
            ON abonnement.id_adherent = adherent.id_adherent
            WHERE id_abonnement = ?";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

    // Create subscription
    public function create($type, $dateDebut, $dateFin, $idAdherent)
    {
        $sql = "INSERT INTO abonnement
                (type_abonnement, date_debut, date_fin, id_adherent)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $type,
            $dateDebut,
            $dateFin,
            $idAdherent
        ]);
    }

    // Update subscription
    public function update($id, $type, $dateDebut, $dateFin)
    {
        $sql = "UPDATE abonnement
                SET type_abonnement = ?, date_debut = ?, date_fin = ?
                WHERE id_abonnement = ?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $type,
            $dateDebut,
            $dateFin,
            $id
        ]);
    }

    // Delete subscription
    public function delete($id)
    {
        $sql = "DELETE FROM abonnement
                WHERE id_abonnement = ?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$id]);
    }

    // Check active subscription for a member
    public function hasActiveSubscription($idAdherent)
    {
        $sql = "SELECT * FROM abonnement
                WHERE id_adherent = ?
                AND CURDATE() BETWEEN date_debut AND date_fin";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$idAdherent]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Check if the member has subscriptions
    public function hasSubscriptions($idAdherent)
    {
    $sql = "SELECT COUNT(*) 
            FROM abonnement
            WHERE id_adherent = ?";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute([$idAdherent]);

    return $stmt->fetchColumn() > 0;
    }

}