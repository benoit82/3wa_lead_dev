<?php
/* Soit la matrice de prix HT suivantes calculez le total TTC avec une tva de 20% des prix pairs uniquement. */

function totalOdd(array $prods)
{
    $tva = .2;
    $totalTTC = 0.00;

    foreach ($prods as $prices) {
        $oddPrices = array_filter($prices, fn ($price) => $price % 2 === 0);
        foreach ($oddPrices as $price) {
            $totalTTC += $price * (1 + $tva);
        }
    }

    return $totalTTC;
}


$products = [
    [10, 7, 9, 8, 6],
    [15, 17, 4, 18, 3],
    [2, 20, 101, 81, 62],
    [32, 17, 25, 97, 16],
    [5, 17, 10, 5, 10],
];

echo totalOdd($products);
