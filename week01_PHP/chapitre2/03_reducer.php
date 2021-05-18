<?php
// Créez maintenant un reducer à l'aide d'une fonction de callback passée en paramètre de votre fonction.

$f = fn (int $accumulateur, int $valeurCourante) => $accumulateur + $valeurCourante;

function my_reduce(array $values, callable $callback, int $initial = 0): int
{
    $accumulateur = $initial;
    foreach ($values as $currentValue) {
        $accumulateur = $callback($accumulateur, $currentValue);
    }
    return $accumulateur;
}

$numbers = [1, 2, 3, 4];

echo my_reduce($numbers, $f);
