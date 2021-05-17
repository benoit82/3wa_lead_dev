<?php

function xrange(int $start, int $limit, int $step = 1)
{
    for ($i = $start; $i < $limit; $i += $step) {
        yield $i;
    }
}
$gen = xrange(0, 10);

foreach ($gen as $num) {
    echo $num . PHP_EOL;
}
