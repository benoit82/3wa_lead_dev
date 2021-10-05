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
        $shouldBeTheLastEvenNumber = $this->max % 2 === 0 ? $this->max - 2 : $this->max - 1;
        $this->assertSame($this->even->getLastNumber(), $shouldBeTheLastEvenNumber);
    }
}