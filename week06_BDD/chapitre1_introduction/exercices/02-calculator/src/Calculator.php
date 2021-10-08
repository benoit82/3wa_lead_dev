<?php

namespace App;

class Calculator {

    public function __construct(
        private array $memory = [],
        private int $precision = 2
    )
    {
    }

    public function add(float $num1, float $num2)
    {
        $this->memory[] = round($num1 + $num2, $this->precision);
    }

    public function reset()
    {
        $this->memory = [];
    }

    /**
     * Get the value of memory
     *
     * @return  mixed
     */
    public function getMemory()
    {
        return $this->memory;
    }
}