<?php
define('TVA', .2);
$products = [['milk', 3, 3], ['butter', 2.5, 2], ['eggs', .7, 10]];
//repris de l'éxercice précédent
function my_reduce(array $values, callable $callback, int $initial = 0): int
{
    $accumulateur = $initial;
    foreach ($values as $currentValue) {
        $accumulateur = $callback($accumulateur, $currentValue);
    }
    return $accumulateur;
}

$hydrate = function () use ($products): array {
    $res = [];

    foreach ($products as list($name, $price, $qte)) {
        $res[] = new class(name: $name, price: $price, qte: $qte)
        {
            public function __construct(
                public string $name,
                public float $price,
                public int $qte,
                public float $tva = TVA
            ) {
            }
        };
    }

    return $res;
};

$callback = function ($totalTTC, $currentObj) {
    return $totalTTC + (($currentObj->price *  $currentObj->qte) * (1 + $currentObj->tva));
};


echo my_reduce($hydrate(), $callback, 0); // 21