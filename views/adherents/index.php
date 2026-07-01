<?php

require_once "../../app/Controllers/AdherentController.php";

$controller = new AdherentController();

if (isset($_GET['delete'])) {

    $controller->destroy($_GET['delete']);

    header("Location: index.php");
    exit;
}

$adherents = $controller->index();

require_once "../partials/header.php";
require_once "../partials/navbar.php";

?>
<div class="container">

    <h1>Liste des Adhérents</h1>

    <br>

    <a href="create.php" class="btn btn-success">
        + Ajouter un adhérent
    </a>

    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Date d'inscription</th>
                <th>Salle</th>
                <th>Actions</th>
            </tr>

        </thead>

        <tbody>

            <?php foreach ($adherents as $adherent) : ?>

                <tr>

                    <td><?= $adherent['id_adherent']; ?></td>

                    <td><?= $adherent['nom']; ?></td>

                    <td><?= $adherent['prenom']; ?></td>

                    <td><?= $adherent['email']; ?></td>

                    <td><?= $adherent['telephone']; ?></td>

                    <td><?= $adherent['date_inscription']; ?></td>

                    <td><?= $adherent['nom_salle']; ?></td>

                    <td>

                        <a
                            href="show.php?id=<?= $adherent['id_adherent']; ?>"
                            class="btn">
                            Voir
                        </a>

                        <a
                            href="edit.php?id=<?= $adherent['id_adherent']; ?>"
                            class="btn">
                            Modifier
                        </a>

                      <a
                            href="index.php?delete=<?= $adherent['id_adherent']; ?>"
                            class="btn btn-danger"
                            onclick="return confirm('Voulez-vous vraiment supprimer cet adhérent ?');">
                            Supprimer
                    </a>
                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

<?php
require_once "../partials/footer.php";
?>