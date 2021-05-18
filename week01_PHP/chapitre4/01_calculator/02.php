<?php

require_once('./Calculator.php');

function main()
{
    $calc = new Calculator;

    $calculator = new Calculator;

    $operation = [[11, 2, 3], ["sum"]];
    try {
        echo $calculator->result($operation);
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

main();
