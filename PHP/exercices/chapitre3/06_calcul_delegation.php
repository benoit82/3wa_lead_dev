<?php
function generateur(int $param = 10): Generator
{
    for ($i = 1; $i <= $param; $i++) {
        yield $i;
    }
}

function getOne($param): Generator
{
    for ($i = 1; $i <= $param; $i++) {
        yield 1;
    }
}

function main()
{
    $gen = generateur();

    foreach ($gen as $v) {
        if ($v % 3 === 0) {
            yield from getOne($v);
        } else {
            echo $v . PHP_EOL;
        }
    }
}

main();
