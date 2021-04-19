<?php
/*
Créez une fonction qui prend en argument un tableau de nombres et une valeur entière donnant la position pour spliter le tableau en deux.
Si la valeur de la position est supérieure à la longueur du tableau, retournez le.
Vous pouvez utiliser la fonction array_shift de PHP pour dépiler le tableau.

split_array(numbers: [1,2,3,7], pos : 2);
-> [1,2, 3] [7]

*/

function split_array(array $numbers, int $pos): array
{
    if ($pos >= count($numbers)) {
        return $numbers;
    } else {
        $tab1 = [];
        $tab2 = [];
        for ($i = 0; $i <= $pos; $i++) {
            array_push($tab1, $numbers[$i]);
        }
        for ($i = $pos + 1; $i < count($numbers); $i++) {
            array_push($tab2, $numbers[$i]);
        }
        return [$tab1, $tab2];
    }
}

var_dump(split_array(numbers: [1, 2, 3, 7], pos: 2));
