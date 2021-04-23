<?php

require_once __DIR__ . '/Yam.php';

$yam = new App\Yam;

$yam->lancerDes(50);
$yam->analyserParties();
echo $yam->showStats();
