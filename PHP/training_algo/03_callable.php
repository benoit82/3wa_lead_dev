<?php
// Créer une fonction transform à laquelle vous pourrez passer une fonction de transformation.
// Elle devrait pouvoir travailler autant sur un tableau de strings que sur un tableau de nombres.
// Et elle devrait appliquer la transformation voulue.

function transformNumber(int $nombre): int
{
    return $nombre * 2;
}

function transformString(string $str): string
{
    return strtoupper($str);
}

function transform(array $tab, callable $trans): array
{
    $res = [];
    foreach ($tab as $element) {
        $res[] = $trans($element);
    }
    return $res;
}

$numbers = [1, 2, 3, 4];
$resultat = transform($numbers, 'transformNumber');
assert(is_array($resultat));
assert($resultat[0] === 2);
assert($resultat[1] === 4);
assert($resultat[2] === 6);
assert($resultat[3] === 8);

$names = ["Lior", "Magali", 'Elise'];
$resultat = transform($names, 'transformString');
assert(is_array($resultat));
assert($resultat[0] === "LIOR");
assert($resultat[1] === "MAGALI");
assert($resultat[2] === "ELISE");
