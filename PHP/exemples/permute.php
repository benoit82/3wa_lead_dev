<?php
$a = 1;
$b = 2;
$c = 3;
echo "$a, $b, $c\n";

function permute(&$a, &$b, &$c)
{
    $d = $a;
    $a = $b;
    $b = $c;
    $c = $d;
}

permute($a, $b, $c);

echo "$a, $b, $c";
