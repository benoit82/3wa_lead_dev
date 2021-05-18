<?php

function bubble_sort(array $numbers, callable $callback): array
{
    do {
        $echange = false; // sortie de boucle
        for ($i = 0; $i < count($numbers) - 1; $i++) {
            if ($callback($numbers[$i], $numbers[$i + 1])) {
                list($numbers[$i + 1], $numbers[$i]) = [$numbers[$i], $numbers[$i + 1]];
                $echange = true;
            }
        }
    } while ($echange);
    return $numbers;
}


$asc = function ($element1, $element2): bool {
    return $element1 > $element2;
};
$desc = function ($element1, $element2): bool {
    return $element1 < $element2;
};

var_dump(bubble_sort([8, 1, 0, 17, 15, 2, 7, 12], $asc));
