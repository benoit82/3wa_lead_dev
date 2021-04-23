<?php

require_once('./Calculator.php');

function main()
{
    $calc = new Calculator;

    $calculator = new Calculator;

    $operation = [[11, 2], ["+"]];

    echo $calculator->result($operation);
}

main();
