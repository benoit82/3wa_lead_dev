<?php

class Token
{

    private $max = 10;

    public function token(): string
    {

        return random_bytes($this->max);
    }
}
