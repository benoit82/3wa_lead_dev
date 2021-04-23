<?php

require_once('./Calculator.php');

function main()
{
    $calc = new Calculator;

    $calculator = new Calculator;

    $operation = [[11, 2], ["toto"]];
    try {
        echo $calculator->result($operation);
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

main();
