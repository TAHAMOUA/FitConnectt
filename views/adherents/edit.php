<?php

require_once "../../app/Controllers/AdherentController.php";
require_once "../../app/Controllers/SalleController.php";

$adherentController = new AdherentController();
$salleController = new SalleController();

$salles = $salleController->index();

$id = $_GET['id'];

$adherent = $adherentController->show($id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $adherentController->update(
        $id,
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

    <h1>Modifier un adhérent</h1>

    <form method="POST">

        <label>Nom</label>
        <input
            type="text"
            name="nom"
            value="<?= $adherent['nom']; ?>"
            required>

        <label>Prénom</label>
        <input
            type="text"
            name="prenom"
            value="<?= $adherent['prenom']; ?>"
            required>

        <label>Email</label>
        <input
            type="email"
            name="email"
            value="<?= $adherent['email']; ?>"
            required>

        <label>Téléphone</label>
        <input
            type="text"
            name="telephone"
            value="<?= $adherent['telephone']; ?>"
            required>

        <label>Date d'inscription</label>
        <input
            type="date"
            name="date_inscription"
            value="<?= $adherent['date_inscription']; ?>"
            required>

        <label>Salle</label>

        <select name="id_salle" required>

            <?php foreach ($salles as $salle) : ?>

                <option
                    value="<?= $salle['id_salle']; ?>"
                    <?= ($salle['id_salle'] == $adherent['id_salle']) ? "selected" : ""; ?>>

                    <?= $salle['nom_salle']; ?>

                </option>

            <?php endforeach; ?>

        </select>

        <button type="submit" class="btn btn-success">
            Modifier
        </button>

    </form>

</div>

<?php require_once "../partials/footer.php"; ?>