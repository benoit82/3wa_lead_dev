<?php

require_once __DIR__ . '/Yam.php';

$yam = new App\Yam;

$yam->lancerDes(); // lance 50 parties par default
$yam->analyserParties();
echo $yam->showStats();
