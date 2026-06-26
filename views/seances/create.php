<?php

require_once "../../app/Controllers/SeanceController.php";
require_once "../../app/Controllers/AdherentController.php";
require_once "../../app/Controllers/SalleController.php";

$seanceController = new SeanceController();
$adherentController = new AdherentController();
$salleController = new SalleController();

$adherents = $adherentController->index();
$salles = $salleController->index();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $seanceController->store(
        $_POST["date_seance"],
        $_POST["type_activite"],
        $_POST["duree"],
        $_POST["equipement_utilise"],
        $_POST["id_adherent"],
        $_POST["id_salle"]
    );

    header("Location: index.php");
    exit;
}

require_once "../partials/header.php";
require_once "../partials/navbar.php";

?>

<div class="container">

    <h1>Ajouter une séance</h1>

    <form method="POST">

        <label>Date de la séance</label>
        <input
            type="date"
            name="date_seance"
            required>

        <label>Type d'activité</label>

        <select name="type_activite" required>
            <option value="">-- Choisir --</option>
            <option value="Musculation">Musculation</option>
            <option value="Cardio">Cardio</option>
            <option value="CrossFit">CrossFit</option>
        </select>

        <label>Durée (minutes)</label>
        <input
            type="number"
            name="duree"
            min="1"
            required>

        <label>Équipement utilisé</label>
        <input
            type="text"
            name="equipement_utilise"
            required>

        <label>Adhérent</label>

        <select name="id_adherent" required>

            <?php foreach ($adherents as $adherent) : ?>

                <option value="<?= $adherent['id_adherent']; ?>">

                    <?= $adherent['nom']; ?>
                    <?= $adherent['prenom']; ?>

                </option>

            <?php endforeach; ?>

        </select>

        <label>Salle</label>

        <select name="id_salle" required>

            <?php foreach ($salles as $salle) : ?>

                <option value="<?= $salle['id_salle']; ?>">

                    <?= $salle['nom_salle']; ?>

                </option>

            <?php endforeach; ?>

        </select>

        <button
            type="submit"
            class="btn btn-success">

            Ajouter

        </button>

    </form>

</div>

<?php require_once "../partials/footer.php"; ?>