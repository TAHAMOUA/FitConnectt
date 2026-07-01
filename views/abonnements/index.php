<?php

require_once "../../app/Controllers/AbonnementController.php";

$controller = new AbonnementController();

if (isset($_GET['delete'])) {

    $controller->destroy($_GET['delete']);

    header("Location: index.php");
    exit;
}

$abonnements = $controller->index();

require_once "../partials/header.php";
require_once "../partials/navbar.php";

?>

<div class="container">

    <h1>Liste des Abonnements</h1>

    <br>

    <a href="create.php" class="btn btn-success">
        + Ajouter un abonnement
    </a>

    <table>

        <thead>

            <tr>

                <th>ID</th>
                <th>Adhérent</th>
                <th>Type</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Actions</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach ($abonnements as $abonnement) : ?>

                <tr>

                    <td><?= $abonnement['id_abonnement']; ?></td>

                    <td>
                        <?= $abonnement['nom']; ?>
                        <?= $abonnement['prenom']; ?>
                    </td>

                    <td><?= $abonnement['type_abonnement']; ?></td>

                    <td><?= $abonnement['date_debut']; ?></td>

                    <td><?= $abonnement['date_fin']; ?></td>

                    <td>

                        <a
                            href="edit.php?id=<?= $abonnement['id_abonnement']; ?>"
                            class="btn">
                            Modifier
                        </a>

                        <a
                            href="index.php?delete=<?= $abonnement['id_abonnement']; ?>"
                            class="btn btn-danger"
                            onclick="return confirm('Voulez-vous vraiment supprimer cet abonnement ?');">
                            Supprimer
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

<?php require_once "../partials/footer.php"; ?>