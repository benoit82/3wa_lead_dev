<?php

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

    foreach ($products as $product) {
        $res[] = new class(name: $product[0], price: $product[1], qte: $product[2])
        {
            public function __construct(
                public string $name,
                public int $price,
                public int $qte
            ) {
            }
        };
    }

    return $res;
};

$callback = function ($totalTTC, $currentObj) {
    return $totalTTC + ($currentObj->price *  $currentObj->qte);
};

$products = [['milk', 3, 3], ['butter', 2.5, 2], ['eggs', .7, 10]];
echo my_reduce($hydrate(), $callback, 0); // 21