<?php
// Framework de tests PHPUNIT
use PHPUnit\Framework\TestCase;

use App\Calculator;

class CalculatorTest extends TestCase
{

    protected Calculator $calculator;

    public function setUp(): void
    {
        $this->calculator = new Calculator(2);
    }

    public function addProvider(): array {
        return [
            [1,2,3],
            [3.31,4.2,7.51]
        ];
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
        $this->expectExceptionMessage('Impossible de diviser par zéro');
        $this->calculator->division(2,0);
    }
}
