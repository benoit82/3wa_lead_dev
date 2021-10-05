<?php

namespace App;

use \Iterator;

class Even implements Iterator {

    private int $position = 0;
    private int $max;

    public function __construct(int $max)
    {
        $this->max = $max;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->position * 2;
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return $this->current() < $this->max;
    }

    public function getLastNumber()
    {
        $this->rewind();
        while ($this->valid()) {
            $this->next();
        }
        return ($this->position -1) * 2;
    }

}