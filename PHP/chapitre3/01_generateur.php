<?php

function genOdd(int $n)
{
    for ($i = 0; $i < $n; $i = $i + 2) {
        yield $i;
    }
}
$gen = genOdd(28);

foreach ($gen as $num) {
    echo $num . PHP_EOL;
}
