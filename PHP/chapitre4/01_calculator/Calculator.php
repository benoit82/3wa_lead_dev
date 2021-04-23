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
}
