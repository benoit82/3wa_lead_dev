<?php

namespace App;

class Even implements \Iterator {

    private int $position = 0;
    private array $array = [];

    public function __construct(int $max)
    {
        for ($i=0; $i < $max; $i++) { 
            if($i%2 === 0) $this->array[] = $i;
        }
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->array[$this->position];
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
        return isset($this->array[$this->position]);
    }

    public function getLastNumber()
    {
        return $this->array[count($this->array) -1];
    }

}