<?php

function filter(array $nombres): array
{
    $res = [];
    foreach ($nombres as $nombre) {
        if ($nombre > 10) $res[] = $nombre;
    }
    return $res;
}

function testWeCanFilter()
{
    $nombres = [2, 20, 1, 15, 11];

    $results = filter($nombres);

    assert(is_array($results));
    assert(count($results) === 3);
    assert($results[0] === 20);
    assert($results[1] === 15);
    assert($results[2] === 11);
}

testWeCanFilter();
