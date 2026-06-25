<?php

require_once "../../app/Services/AbonnementService.php";

try {

    $service = new AbonnementService();

    $service->createAbonnement(
        "Mensuel",
        "2026-07-01",
        "2026-07-31",
        1
    );

    echo "Abonnement ajouté avec succès";

} catch (Exception $e) {

    echo $e->getMessage();

}