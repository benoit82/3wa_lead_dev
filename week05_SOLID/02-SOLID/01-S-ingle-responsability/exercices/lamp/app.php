<?php

spl_autoload_register(function ($class) {
    include __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
});

$light = new Light;
$lamp = new Lamp($light);
// $lamp est une instance de la classe Lamp

echo $lamp; // Off
$lamp->switch();
echo $lamp; // On
