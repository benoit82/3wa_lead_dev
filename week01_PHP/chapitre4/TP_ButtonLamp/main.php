<?php
require_once __DIR__ . '/Button.php';
require_once __DIR__ . '/Lamp.php';

$lamp= new App\Button(new App\Lamp);

echo $lamp->switchDevice(); // turn on
echo $lamp->switchDevice(); // turn off
echo $lamp->switchDevice(); // turn on
echo $lamp->switchDevice(); // turn off