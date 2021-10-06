<?php

namespace App;
use \Iterator;

class Fibonacci implements Iterator
{
    private int $position = 0;
    private int $cumul = 0;

    public function __construct(private int $limitPosition = 10)
    {
    }

    public function rewind()
    {
        $this->position = 0;
        $this->cumul = 0;
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++; // 0 1 2
        $this->cumul += $this->position; // 0 1 

    }

    public function current()
    {
        return $this->cumul;
    }

    public function valid()
    {
        return $this->position <= $this->limitPosition;
    }
}
