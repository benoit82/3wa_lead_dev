<?php

require_once('./Calculator.php');

function main(float $num1 = 1, float $num2 = 2)
{
    $calc = new Calculator($num1, $num2);

    echo "NUM1 :  $calc->number1  | NUM2 : $calc->number2" . PHP_EOL;
    echo "ADDITION : " . $calc->addition() . PHP_EOL;
    echo "SOUSTRACTION : " . $calc->soustraction() . PHP_EOL;
    echo "MULTIPLICATION : " . $calc->multiplication() . PHP_EOL;
    echo "DIVISION : " . $calc->division() . PHP_EOL;
}

main();
echo "==========================" . PHP_EOL;
main(26.2, 14.5);
