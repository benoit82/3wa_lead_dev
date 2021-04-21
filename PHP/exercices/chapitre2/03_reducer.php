<?php
// Créez maintenant un reducer à l'aide d'une fonction de callback passée en paramètre de votre fonction.

$f = function (int $accumulateur, int $valeurCourante) {
    $accumulateur += $valeurCourante;
    return $accumulateur;
};

function my_reduce(array $numbers, callable $fn, int $initial = 0): int
{
    $sum = $initial;
    foreach ($numbers as $number) {
        $sum = $fn($sum, $number);
    }
    return $sum;
}

$numbers = [1, 2, 3, 4];

echo my_reduce($numbers, $f);
