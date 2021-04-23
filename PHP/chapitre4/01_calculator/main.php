<?php

require_once('./Calculator.php');

function main(float $num1 = 1, float $num2 = 2)
{
    $calc = new Calculator;

    echo "NUM1 :  $num1  | NUM2 : $num2" . PHP_EOL;
    echo "ADDITION : " . $calc->addition($num1, $num2) . PHP_EOL;
    echo "SOUSTRACTION : " . $calc->soustraction($num1, $num2) . PHP_EOL;
    echo "MULTIPLICATION : " . $calc->multiplication($num1, $num2) . PHP_EOL;
    echo "DIVISION : " . $calc->division($num1, $num2) . PHP_EOL;
    echo "==========================" . PHP_EOL;
}

main();
main(26.2, 14.5);
