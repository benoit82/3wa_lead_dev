<?php

class Calculator
{
    public function __construct(
        private int $precision = 2
    ) {
    }

    public function addition(float $a, float $b): float
    {
        return $a + $b;
    }

    public function soustraction(float $a, float $b): float
    {
        return $a - $b;
    }

    public function multiplication(float $a, float $b): float
    {
        return $a * $b;
    }

    public function division(float $a, float $b): float
    {
        if ((int) $b === 0) throw new DivideByZeroException("Impossible de diviser par zéro");
        return round($a / $b, $this->precision);
    }

    public function result(array $operation): float | Exception
    {
        list($numbers, $operator) = $operation;
        return match (array_shift($operator)) {
            "+" => $this->addition($numbers[0], $numbers[1]),
            "-" => $this->soustraction($numbers[0], $numbers[1]),
            "*" => $this->multiplication($numbers[0], $numbers[1]),
            "/" => $this->division($numbers[0], $numbers[1]),
            default => throw new Exception("Opérateur invalid"),
        };
    }
}
