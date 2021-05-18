<?php

function speed_power(int $x, int $n): int
{
    /*
    compte le nombre d'occurence d'appel à la fonction
    
    static $count;

    $count++;

    echo $count; */

    if ($n === 1) return $x; // condition terminale

    if ($n % 2 === 0) {
        $z = speed_power($x, $n / 2);
        return $z * $z;
    } else {
        $z = speed_power($x, ($n - 1) / 2);
        return $z * $z * $x;
    }
}

echo speed_power(3, 7);
