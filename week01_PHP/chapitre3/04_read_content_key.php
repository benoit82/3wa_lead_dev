<?php

function readChar($file)
{

    $f = fopen($file, 'r');
    while ($line = fgets($f)) {
        $line = str_replace(["\n", "\r"], ['', ''], $line);
        list($key, $value) = explode('=', $line);
        yield $key => $value;
    }

    fclose($f);
}

$gen = readChar('../content/content_key.txt');

foreach ($gen as $key => $value) echo "$key --> $value" . PHP_EOL;
