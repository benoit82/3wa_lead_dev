<?php
const FILE_BASE_PATH = '../content/shop/';
function getFileContent(string $file, string $separator = ' = '): Generator
{
    $f = fopen($file, 'r');
    while ($line = fgets($f)) {
        $line = str_replace(["\n", "\r"], ['', ''], $line);
        list($key, $value) = explode($separator, $line);
        yield $key => $value;
    }

    fclose($f);
}

function main(): void
{
    $genUsers = getFileContent(FILE_BASE_PATH . 'users.txt');

    foreach ($genUsers as $id => $name) {
        $genPrices = getFileContent(FILE_BASE_PATH . 'prices.txt');
        foreach ($genPrices as $id2 => $price) {
            if ($id === $id2) echo "Name : $name, price : $price" . PHP_EOL;
        }
    }
}

main();
