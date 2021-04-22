<?php

function getFileContent($file): Generator
{
    $f = fopen($file, 'r');
    while ($line = fgets($f)) {
        $line = str_replace(["\n", "\r"], ['', ''], $line);
        list($key, $value) = explode('=', $line);
        yield $key => $value;
    }

    fclose($f);
}

function main()
{
    $genUsers = getFileContent('../content/shop/users.txt');
    $genPrices = getFileContent('../content/shop/prices.txt');

    foreach ($genUsers as $id => $name) {
        foreach ($genPrices as $id2 => $price) {
            if ($id === $id2) echo "$name : $price" . PHP_EOL;
        }
    }
}

main();
