<?php

require __DIR__ . '/vendor/autoload.php';

use Parking\{Car, Byke, Parking, Plane, Ferry};

Car::setSpeed(180);
Plane::setSpeed(890.5);

$brompton = new Byke('brompton');
$kia = new Car('kia');

$airbus = new Plane('airbus 320');

$parking = new Parking();
$parking->addPark($brompton);
$parking->addPark($kia);

try {
    $parking->addPark($airbus); // exception

} catch (TypeError $e) {
    echo $e->getMessage();
}

echo $parking . "\n";

$ferry = new Ferry($parking);

$telsa = new Car('tesla');
$parking->addPark($telsa);
echo $parking . "\n";
