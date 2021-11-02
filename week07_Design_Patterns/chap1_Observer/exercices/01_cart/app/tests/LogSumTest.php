<?php

use PHPUnit\Framework\TestCase;
use App\{LogSum, Product, Cart};

class LogSumTest extends TestCase
{
    private $logSum;
    private $cart;
    private $products;

    public function setup(): void
    {
        $this->logSum = new LogSum;
        $this->cart = new Cart;
        $this->cart->attach($this->logSum);

    }

    /**
     * @test testLogSumTotal test an update of logSum
     */
    public function testLogSumTotal()
    {
        $apple = new Product("Apple", 5);
        $this->cart->buy($apple,2);
        $this->assertSame($this->logSum->getLastTotal(),$this->cart->total());
    }
}
