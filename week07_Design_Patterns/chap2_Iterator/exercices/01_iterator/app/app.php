<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Model\{Person, Population};
use App\ReadIterator;

$popFile = new ReadIterator(__DIR__ . '/Data/populations.txt');

$population = new Population();

foreach ($popFile as $person) {
    [$id, $name] = explode(',', $person);
    $population->addPerson(new Person(name: trim($name),id: (int) $id));
}

var_dump($population);