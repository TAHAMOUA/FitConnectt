<?php

require_once "../../app/Controllers/SalleController.php";

$controller = new SalleController();

echo "<pre>";

print_r($controller->index());

echo "</pre>";