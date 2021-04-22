<?php
function generateur($param = 10)
{
    for ($i = 1; $i <= $param; $i++) {
        yield $i;
    }
}

function gen()
{
    $gen = generateur();

    foreach ($gen as $v) {
        if ($v % 3 === 0) {
            for ($a = 0; $a < $v; $a++) {
                echo "1" . PHP_EOL;
            }
        } else {
            echo $v . PHP_EOL;
        }
    }
}

gen();
