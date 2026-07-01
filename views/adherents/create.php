<?php

require_once "../../app/Controllers/AdherentController.php";
require_once "../../app/Controllers/SalleController.php";

$adherentController = new AdherentController();
$salleController = new SalleController();

$salles = $salleController->index();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $adherentController->store(
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["email"],
        $_POST["telephone"],
        $_POST["date_inscription"],
        $_POST["id_salle"]
    );

    header("Location: index.php");
    exit;
}

require_once "../partials/header.php";
require_once "../partials/navbar.php";

?>

<div class="container">

    <h1>Ajouter un adhérent</h1>

    <form method="POST">

        <label>Nom</label>
        <input type="text" name="nom" required>

        <label>Prénom</label>
        <input type="text" name="prenom" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Téléphone</label>
        <input type="text" name="telephone" required>

        <label>Date d'inscription</label>
        <input type="date" name="date_inscription" required>

        <label>Salle</label>

        <select name="id_salle" required>

            <?php foreach ($salles as $salle) : ?>

                <option value="<?= $salle['id_salle']; ?>">
                    <?= $salle['nom_salle']; ?>
                </option>

            <?php endforeach; ?>

        </select>

        <button type="submit" class="btn btn-success">
            Ajouter
        </button>

    </form>

</div>

<?php require_once "../partials/footer.php"; ?>