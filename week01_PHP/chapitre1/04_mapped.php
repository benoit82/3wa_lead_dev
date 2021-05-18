<?php
/*
 Créez une fonction mapped avec trois arguments glue, array et symbol. Voyez l'exemple ci-dessous.
 Elle permettra de rassembler les clés et les valeurs dans une chaîne de caractères.

mapped(numbers: ['x' => 1,'y' => 2,'z' => 3,'t' => 7], glue : ', ', symbol : "=");

x = 1, y = 2, z = 3, t = 7
*/

function mapped(array $numbers, string $glue, string $symbol): string
{
    $str = "";
    foreach ($numbers as $key => $value) {
        $str .=  "$key $symbol $value$glue";
    }
    return substr($str, 0, strlen($glue) * -1); // retire la dernière glue
}

echo mapped(numbers: ['x' => 1, 'y' => 2, 'z' => 3, 't' => 7], glue: ', ', symbol: "=");
