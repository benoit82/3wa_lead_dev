<?php

class Area
{

    public function __construct(
        private array $shapes = []
    ) {
    }

    public function sum()
    {
        foreach ($this->shapes as $shape) {
            $area[] = $shape->calcArea();
        }

        return array_sum($area);
    }
}
