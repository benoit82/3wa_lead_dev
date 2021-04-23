<?php

require_once __DIR__ . '/vendor/autoload.php';

$yam = new App\Yam;

$yam->lancerDes(50);
$yam->analyserParties();
echo $yam->showStats();