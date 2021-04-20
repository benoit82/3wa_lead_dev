<?php
/*
Créer la fonction getMaxNumber
*/

function getMaxNumber(array $numbers): int
{
    $max = null;
    foreach ($numbers as $number) {
        if ($max === null) {
            $max = $number;
        } else {
            if ($number > $max) $max = $number;
        }
    }
    return $max;
}

$nombres = [4, 10, 3, 1, 20, 5];

$max = getMaxNumber($nombres);
var_dump($max);
// doit afficher 20