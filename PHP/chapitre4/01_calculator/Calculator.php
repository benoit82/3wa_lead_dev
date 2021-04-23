<?php

class Calculator
{
    public function __construct(
        public float $number1,
        public float $number2,
    ) {
    }

    public function addition(): float
    {
        return $this->number1 + $this->number2;
    }

    public function soustraction(): float
    {
        return $this->number1 - $this->number2;
    }

    public function multiplication(): float
    {
        return $this->number1 * $this->number2;
    }

    public function division(): float
    {
        return $this->number1 / $this->number2;
    }
}
