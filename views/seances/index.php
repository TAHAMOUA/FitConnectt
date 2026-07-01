<?php

require_once "../../app/Controllers/SeanceController.php";

$controller = new SeanceController();

if (isset($_GET['delete'])) {

    $controller->destroy($_GET['delete']);

    header("Location: index.php");
    exit;
}

$seances = $controller->index();

require_once "../partials/header.php";
require_once "../partials/navbar.php";

?>

<div class="container">

    <h1>Liste des Séances</h1>

    <br>

    <a href="create.php" class="btn btn-success">
        + Ajouter une séance
    </a>

    <table>

        <thead>

            <tr>

                <th>ID</th>
                <th>Date</th>
                <th>Type</th>
                <th>Durée</th>
                <th>Équipement</th>
                <th>Adhérent</th>
                <th>Salle</th>
                <th>Actions</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach ($seances as $seance) : ?>

                <tr>

                    <td><?= $seance['id_seance']; ?></td>

                    <td><?= $seance['date_seance']; ?></td>

                    <td><?= $seance['type_activite']; ?></td>

                    <td><?= $seance['duree']; ?> min</td>

                    <td><?= $seance['equipement_utilise']; ?></td>

                    <td>
                        <?= $seance['nom']; ?>
                        <?= $seance['prenom']; ?>
                    </td>

                    <td><?= $seance['nom_salle']; ?></td>

                    <td>

                        <a
                            href="edit.php?id=<?= $seance['id_seance']; ?>"
                            class="btn">
                            Modifier
                        </a>

                        <a
                            href="index.php?delete=<?= $seance['id_seance']; ?>"
                            class="btn btn-danger"
                            onclick="return confirm('Voulez-vous vraiment supprimer cette séance ?');">
                            Supprimer
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

<?php require_once "../partials/footer.php"; ?>