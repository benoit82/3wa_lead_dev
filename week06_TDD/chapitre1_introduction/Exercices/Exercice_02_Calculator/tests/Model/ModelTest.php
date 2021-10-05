<?php

use App\Model\{Add, Divisor, Number, NumberString};
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
        $this->assertEquals("6.0", $add->exec($this->a, $this->b));
    }

    public function testDivisor()
    {
        $div = new Divisor;
        $this->assertInstanceOf(NumberString::class, $div->exec($this->a, $this->b));
        $this->assertEquals("2.0", $div->exec($this->a, $this->b));
    }

    public function testExceptionDivisor()
    {
        $div = new Divisor;
        $this->expectException(DivisionByZeroError::class);
        $this->expectExceptionMessage("Impossible de diviser par zéro.");
        $this->assertEquals("2.0", $div->exec($this->a, new Number(0)));
    }
}
