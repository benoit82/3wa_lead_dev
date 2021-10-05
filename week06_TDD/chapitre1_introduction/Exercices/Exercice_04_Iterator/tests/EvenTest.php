<?php

use PHPUnit\Framework\TestCase;

use App\Even;

class EvenTest extends TestCase
{
    protected Even $even;

    public function setUp(): void
    {
        $this->even = new Even(100);
        $this->even->rewind();
    }

    public function testValuesAreEven(): void
    {
        foreach ($this->even as $value) {
            $this->assertTrue($value % 2 === 0);
        }
    }

    public function testNumberOfValues(): void
    {
        $this->assertSame(iterator_count($this->even), 100 / 2);
    }

    public function testNumbers(): void
    {
        $this->assertSame($this->even->current(), 0);

        $this->even->next();
        $this->assertSame($this->even->current(), 2);

        $this->assertSame($this->even->key(), 1);
        $this->assertTrue($this->even->valid());
        
        $this->even->rewind();
        $this->assertSame($this->even->key(), 0);
    }

    public function testLastNumber(): void
    {
        $this->assertSame($this->even->getLastNumber(), 98);
    }
}