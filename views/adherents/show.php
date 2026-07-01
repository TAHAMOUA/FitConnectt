<?php

require_once "../../app/Controllers/AdherentController.php";

$controller = new AdherentController();

$id = $_GET['id'];

$adherent = $controller->show($id);

require_once "../partials/header.php";
require_once "../partials/navbar.php";

?>

<div class="container">

    <h1>Détails de l'adhérent</h1>

    <table>

        <tr>
            <th>ID</th>
            <td><?= $adherent['id_adherent']; ?></td>
        </tr>

        <tr>
            <th>Nom</th>
            <td><?= $adherent['nom']; ?></td>
        </tr>

        <tr>
            <th>Prénom</th>
            <td><?= $adherent['prenom']; ?></td>
        </tr>

        <tr>
            <th>Email</th>
            <td><?= $adherent['email']; ?></td>
        </tr>

        <tr>
            <th>Téléphone</th>
            <td><?= $adherent['telephone']; ?></td>
        </tr>

        <tr>
            <th>Date d'inscription</th>
            <td><?= $adherent['date_inscription']; ?></td>
        </tr>

        <tr>
            <th>Salle</th>
            <td><?= $adherent['nom_salle']; ?></td>
        </tr>

    </table>

    <br>

    <a href="index.php" class="btn">
        Retour
    </a>

    <a href="edit.php?id=<?= $adherent['id_adherent']; ?>" class="btn btn-success">
        Modifier
    </a>

</div>

<?php require_once "../partials/footer.php"; ?>