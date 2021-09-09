<?php

class Rectangle implements Figure
{
    public function __construct(
        private float $w,
        private float $h
    ) {
    }
    public function calcArea(): float {
        return $this->w * $this->h;
    }

}
