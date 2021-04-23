<?php
/*
Ecrire la fonction transform
*/

// #1
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


// #2
function transformStrings(array $strings): array
{
    $res = [];
    foreach ($strings as $str) {
        $res[] = strtoupper($str);
    }
    return $res;
}

function testThatTransformStringsWorks()
{
    $chaines = ['Lior', 'Magali', 'Elise'];

    $transmation = transformStrings($chaines);

    assert(is_array($transmation));
    assert($transmation[0] === 'LIOR');
    assert($transmation[1] === 'MAGALI');
    assert($transmation[2] === 'ELISE');
}

// tests launchers
testThatTransformWorks();
testThatTransformStringsWorks();
