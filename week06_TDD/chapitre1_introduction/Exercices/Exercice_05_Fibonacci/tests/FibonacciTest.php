<?php

use PHPUnit\Framework\TestCase;
use App\Fibonacci;

class FibonacciTest extends TestCase {

    protected Fibonacci $fibonacci;

    public function setUp(): void
    {
        $this->fibonacci = new Fibonacci;
    }

    public function testCurrentNumberEquals2LastNumber()
    {
        $this->fibonacci->rewind();
        $number = 0;
        $arrayNumbers = [];

        while ($this->fibonacci->valid()) {
            $arrayNumbers[] = $this->fibonacci->current();
            $number += $this->fibonacci->current();
            if($this->fibonacci->key() >= 2) {
                $this->assertSame($number, $arrayNumbers[$this->fibonacci->key() - 2] + $arrayNumbers[$this->fibonacci->key() - 1]);
            }
            $this->fibonacci->next();
        }
    }

}
