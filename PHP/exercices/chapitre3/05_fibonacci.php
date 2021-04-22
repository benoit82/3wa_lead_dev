<?php

function getFibonacci($u = 1, $v = 1)
{
    yield $u;
    yield $v;
    while (true) {
        list($u, $v) = [$v, $u + $v];
        yield $v;
    }
}

$i = 0;

foreach (getFibonacci() as $fibonacci) {
    echo $fibonacci . "\n";
    $i++;
    if ($i > 30) {
        break;
    }
}
