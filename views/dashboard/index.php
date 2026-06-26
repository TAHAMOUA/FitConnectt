<?php
require_once "../partials/header.php";
require_once "../partials/navbar.php";
?>

<div class="container">

    <h1>Dashboard</h1>

    <p>Bienvenue dans le système de gestion <strong>FitConnect</strong>.</p>

    <div class="cards">

        <div class="card">
            <h2>Adhérents</h2>
            <p>Gérer les adhérents du réseau.</p>
            <br>
            <a href="../adherents/index.php" class="btn">
                Voir les adhérents
            </a>
        </div>

        <div class="card">
            <h2>Abonnements</h2>
            <p>Gérer les abonnements.</p>
            <br>
            <a href="../abonnements/index.php" class="btn">
                Voir les abonnements
            </a>
        </div>

        <div class="card">
            <h2>Séances</h2>
            <p>Gérer les séances des adhérents.</p>
            <br>
            <a href="../seances/index.php" class="btn">
                Voir les séances
            </a>
        </div>

    </div>

</div>

<?php
require_once "../partials/footer.php";
?>