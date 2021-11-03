<?php

use App\HTMLElements\{Wrapper, Input};
use PHPUnit\Framework\TestCase;

class WrapperTest extends TestCase
{
    private Wrapper $wrapper;

    public function setup(): void
    {
        $this->wrapper = new Wrapper;
    }

    /**
     * @test testEmptyWrapper should throw an exception as the form is empty
     */
    public function testEmptyWrapper()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Empty Wrapper");

        echo $this->wrapper;
    }

    /**
     * @test testWrapperDisplay display a wrapper with an single HtmlElement
     */
    public function testWrapperDisplay()
    {
        $this->wrapper->add(new Input(name: 'name', placeholder: "Name", type: 'text'));
        $this->assertEquals((string) $this->wrapper, '<div class="wrapper-content"><input type="text" name="name" placeholder="Name" /></div>');
    }

}
