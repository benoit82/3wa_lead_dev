<?php
use PHPUnit\Framework\TestCase;

use Providers\TraitProvider;

use App\Calculator;

class CalculatorTest extends TestCase
{
    use TraitProvider;
    protected Calculator $calculator;

    public function setUp(): void
    {
        $this->calculator = new Calculator(2);
    }

    public function testInstanceOfCalculator(): void
    {
        $this->assertInstanceOf(Calculator::class, $this->calculator);
    }

    /**
     * @dataProvider addProvider
     */
    public function testAddition($a, $b, $expected)
    {
        $this->assertEquals($expected, $this->calculator->add($a, $b));
    }

    public function testDivisionByZero()
    {
        $this->expectException(DivisionByZeroError::class);
        $this->expectExceptionMessage('Impossible de diviser par zéro');
        $this->calculator->division(2, 0);
    }

    public function testDivision()
    {
        $res = $this->calculator->division(50, 5);
        $this->assertEquals($res, 10.0);
    }
}
