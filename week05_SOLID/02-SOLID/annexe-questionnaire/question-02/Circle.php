<?php

class Circle implements Figure
{
    const PRECISION_DECIMAL = 2;
    public function __construct(private float $r)
    {
    }
    public function calcArea(): float
    {
        return round(pi() * ($this->r) ** 2, self::PRECISION_DECIMAL);
    }
}
