<?php
require_once __DIR__ .'/../../config/Database.php';

class SeanceRepository {
    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->connect();
    }

//GET all seance
   public function findAll()
{
    $sql = "SELECT
                seance.*,
                adherent.nom,
                adherent.prenom,
                salle.nom_salle
            FROM seance
            INNER JOIN adherent
                ON seance.id_adherent = adherent.id_adherent
            INNER JOIN salle
                ON seance.id_salle = salle.id_salle";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    //GEt seance by id
  public function findById($id)
{
    $sql = "SELECT
                seance.*,
                adherent.nom,
                adherent.prenom,
                salle.nom_salle
            FROM seance
            INNER JOIN adherent
                ON seance.id_adherent = adherent.id_adherent
            INNER JOIN salle
                ON seance.id_salle = salle.id_salle
            WHERE seance.id_seance = ?";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

    //Creat seance
    public function create($dateseance,$typeactivite,$duree,$equipement,$idadherent,$idsalle){
    $sql ="INSERT INTO seance
            (date_seance, type_activite, duree, equipement_utilise, id_adherent, id_salle)
            VALUES (?,?,?,?,?,?)";
    $stmt = $this->conn->prepare($sql);
     return $stmt->execute([
            $dateseance,
            $typeactivite,
            $duree,
            $equipement,
            $idadherent,
            $idsalle
        ]);
    }
    // Update seance
    public function update($id,$dateseance,$typeactivite,$duree,$equipement){
        $sql = "UPDATE seance
            SET  date_seance = ?,type_activite = ?,duree = ?,equipement_utilise = ?
            WHERE id_seance = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $dateseance,
            $typeactivite,
            $duree,
            $equipement,
            $id
        ]);
    }

    //delete seance
    public function delete($id){
    $sql = "DELETE FROM seance WHERE id_seance = ?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$id]);

    }
    public function findByMemberId($idAdherent){
    $sql = "SELECT * FROM seance
        WHERE id_adherent = ?";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute([$idAdherent]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Check if the member has sessions
    public function hasSeances($idAdherent)
    {
    $sql = "SELECT COUNT(*)
            FROM seance
            WHERE id_adherent = ?";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute([$idAdherent]);

    return $stmt->fetchColumn() > 0;
}
}
























?>