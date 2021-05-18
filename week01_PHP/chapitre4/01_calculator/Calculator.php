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

    public function division(float $a, float $b): float | DivisionByZeroError
    {
        if ((int) $b === 0) throw new DivisionByZeroError("Impossible de diviser par zéro");
        return round($a / $b, $this->precision);
    }

    public function sum(float ...$numbers): float
    {
        return array_reduce($numbers, function ($a, $b) {
            return $a + $b;
        });
    }

    public function result(array $operation): float | Exception
    {
        list($numbers, $operator) = $operation;
        return match (array_shift($operator)) {
            "+" => $this->addition(...$numbers),
            "-" => $this->soustraction(...$numbers),
            "*" => $this->multiplication(...$numbers),
            "/" => $this->division(...$numbers),
            "sum" => $this->sum(...$numbers),
            default => throw new Exception("Opérateur invalide."),
        };
    }
}
