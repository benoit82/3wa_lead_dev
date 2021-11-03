<?php

use App\HTMLElements\{Form, Wrapper, Input};
use PHPUnit\Framework\TestCase;

class FormTest extends TestCase
{
    private Form $form;

    public function setup(): void
    {
        $this->form = new Form(name: "user", action: "/");
    }

    /**
     * @test testEmptyForm should throw an exception as the form is empty
     */
    public function testEmptyForm()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Empty Form");

        echo $this->form;
    }

    /**
     * @test testFormDisplay display a form with an single HtmlElement
     */
    public function testFormDisplay()
    {
        $this->form->add(new Input(name: 'name', placeholder: "Name", type: 'text'));
        $this->assertEquals((string) $this->form, '<form name="user" action="/"><input type="text" name="name" placeholder="Name" /></form>');
    }

    /**
     * @test testFormWithWrapper display a form with an single HtmlElement and a wrapper with an element inside
     */
    public function testFormWithWrapper()
    {
        $this->form->add(new Input(name: 'name', placeholder: "Name", type: 'text'));
        $wrapper = new Wrapper();
        $wrapper->add(new Input('image', 'Image', 'file'));
        $this->form->add($wrapper);
        $this->assertEquals((string) $this->form, '<form name="user" action="/"><input type="text" name="name" placeholder="Name" /><div><input type="file" name="image" placeholder="Image" /></div></form>');
    }
}
