<?php

spl_autoload_register(function ($class) {
    include __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
});

// Livraison Bike
$order = new Order(new ShippingBike, 100);

echo $order->cost();
echo "\n";

// Livraison Feet
$order = new Order(new ShippingFeet, 100);

echo $order->cost();
echo "\n";
