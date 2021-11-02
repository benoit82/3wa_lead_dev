<?php

use PHPUnit\Framework\TestCase;
use App\Oberservers\LogFile;
use App\{Product, Cart};

class LogFileTest extends TestCase
{
    private $logFile;
    private $cart;

    public function setup(): void
    {
        $this->logFile = new LogFile;
        $this->cart = new Cart;
        $this->cart->attach($this->logFile);

    }

    /**
     * @test testLogFile test an update of file
     */
    public function testLogFile()
    {
        $apple = new Product("Apple", 5);
        $this->cart->buy($apple,2);
        $this->assertSame($this->logFile->getTotalFromFile(),$this->cart->total());
    }
}
