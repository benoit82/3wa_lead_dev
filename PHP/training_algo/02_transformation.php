<?php
/*
Ecrire la fonction transform
*/

function transform(array $nombres): array
{
    $res = [];
    foreach ($nombres as $nombre) {
        $res[] = $nombre * 2;
    }
    return $res;
}

function testThatTransformWorks()
{
    $nombres = [1, 2, 3, 4];

    $transmation = transform($nombres);

    assert(is_array($transmation));
    assert($transmation[0] === 2);
    assert($transmation[1] === 4);
    assert($transmation[2] === 6);
    assert($transmation[3] === 8);
}

testThatTransformWorks();
