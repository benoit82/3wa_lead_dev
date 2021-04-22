<?php

function readChar($file)
{

    $f = fopen($file, 'r');
    while ($line = fgets($f)) {
        list($key, $value) = explode('=', $line);
        yield $key => $value;
    }

    fclose($f);
}

$gen = readChar('./content_key.txt');

foreach ($gen as $key => $value) echo "$key --> $value";
