<?php
/*
Créer la fonction getMaxNumber
*/

function getMaxNumber(array $numbers): int
{
    $max = array_shift($numbers);
    foreach ($numbers as $number) {
        if ($number > $max) $max = $number;
    }
    return $max;
}

$nombres = [4, 10, 3, 1, 20, 5];

$max = getMaxNumber($nombres);
var_dump($max);
// doit afficher 20