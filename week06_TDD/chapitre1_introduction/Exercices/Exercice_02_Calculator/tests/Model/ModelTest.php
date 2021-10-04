<?php

use App\Model\{Add, Divisor, Number};
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{

    protected $a;
    protected $b;

    public function setUp(): void
    {
        $this->a = new Number(4.0);
        $this->b = new Number(2.0);
    }

    public function testAdd()
    {
        $add = new Add;
        $this->assertEquals("6.0", $add->add($this->a, $this->b));
    }

    public function testDivisor()
    {
        $div = new Divisor;
        $this->assertEquals("2.0", $div->division($this->a, $this->b));
    }

    public function testExceptionDivisor()
    {
        $div = new Divisor;
        $this->expectException(DivisionByZeroError::class);
        $this->expectExceptionMessage("Impossible de diviser par zéro.");
        $this->assertEquals("2.0", $div->division($this->a, new Number(0)));
    }
}
