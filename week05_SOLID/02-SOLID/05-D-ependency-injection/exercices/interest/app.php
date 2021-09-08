<?php
spl_autoload_register(function ($class) {
    include __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
});

$storage = new SplObjectStorage;
$alan = new User($storage);

$python = new Interest('Python');
$alan->setInterest($python);

$php = new Interest('PHP');
$alan->setInterest($php);

$javascript = new Interest('Javascript');
$alan->setInterest($javascript);

echo "\n";
echo $alan->getInterests();
echo "\n";

// Préparer les intérets dans un container de service

$container = new Container(new SplObjectStorage);

$sql = new Interest('SQL');
$container->setStorage($sql, 'SQL');

$alan->setInterest($container->getStorage('SQL'));

$bigdata = new Interest('DATA');
$container->setStorage($bigdata, 'DATA');

$alan->setInterest($container->getStorage('DATA'));

var_dump($container->getStorage('DATA')); // retourne un intéret dans le container

echo "\n";
$alan->getInterests();
echo "\n";
