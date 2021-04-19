<?php
/*
Créez une fonction permettant de regrouper terme à terme les éléments de deux tableaux de dimension 1.
Elle retournera un tableau de dimension 2 regroupant les éléments.
*/

function zipper(array $tab1, array $tab2): array
{
    $res = [];
    while (isset($tab1[0]) && isset($tab2[0])) {
        $res[] = [array_shift($tab1), array_shift($tab2)];
    }
    return $res;
}


var_dump(zipper(tab1: [1, 2, 3], tab2: [4, 5, 6]));
// [[1,4], [2,5], [3, 6]]