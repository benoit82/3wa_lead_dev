<?php

class Square implements Figure
{
    public function __construct(private float $c)
    {
    }
    public function calcArea(): float {
        return $this->c**2;
    }
}
