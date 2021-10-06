<?php

use PHPUnit\Framework\TestCase;

use App\Even;

class EvenTest extends TestCase
{
    protected Even $even;
    protected int $max = 100;

    public function setUp(): void
    {
        $this->even = new Even($this->max);
        $this->even->rewind();
    }

    public function testValuesAreEven(): void
    {
        foreach ($this->even as $value) {
            $this->assertTrue($value % 2 === 0);
        }
    }

    public function testIsIterable()
    {
        $this->assertTrue(is_iterable($this->even));
    }

    public function testNumberOfValues(): void
    {
        $this->assertEquals(iterator_count($this->even), (int) ceil($this->max / 2));
    }

    public function testNumbersAndIteratorBehavior(): void
    {
        $even = new Even(max: 5);
        $even->rewind();
        $this->assertSame($even->current(), 0);

        $even->next();
        $this->assertSame($even->current(), 2);

        $this->assertSame($even->key(), 1);
        $this->assertTrue($even->valid());
        
        $even->rewind();
        $this->assertSame($even->key(), 0);
    }
}