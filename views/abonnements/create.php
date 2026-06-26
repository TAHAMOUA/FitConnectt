<?php

require_once "../../app/Controllers/AbonnementController.php";
require_once "../../app/Controllers/AdherentController.php";

$abonnementController = new AbonnementController();
$adherentController = new AdherentController();

$adherents = $adherentController->index();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $abonnementController->store(
        $_POST["type_abonnement"],
        $_POST["date_debut"],
        $_POST["date_fin"],
        $_POST["id_adherent"]
    );

    header("Location: index.php");
    exit;
}

require_once "../partials/header.php";
require_once "../partials/navbar.php";

?>

<div class="container">

    <h1>Ajouter un abonnement</h1>

    <form method="POST">

        <label>Adhérent</label>

        <select name="id_adherent" required>

            <?php foreach ($adherents as $adherent) : ?>

                <option value="<?= $adherent['id_adherent']; ?>">

                    <?= $adherent['nom']; ?>
                    <?= $adherent['prenom']; ?>

                </option>

            <?php endforeach; ?>

        </select>

        <label>Type d'abonnement</label>

        <select name="type_abonnement" required>

            <option value="">-- Choisir un type --</option>
            <option value="Mensuel">Mensuel</option>
            <option value="Trimestriel">Trimestriel</option>
            <option value="Annuel">Annuel</option>

        </select>

        <label>Date de début</label>

        <input
            type="date"
            name="date_debut"
            required>

        <label>Date de fin</label>

        <input
            type="date"
            name="date_fin"
            required>

        <button
            type="submit"
            class="btn btn-success">

            Ajouter

        </button>

    </form>

</div>

<?php require_once "../partials/footer.php"; ?>