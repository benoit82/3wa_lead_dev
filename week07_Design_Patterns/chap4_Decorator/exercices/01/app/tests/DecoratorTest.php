<?php

use App\models\{Paragraph, Italic, Text};
use PHPUnit\Framework\TestCase;

class DecoratorTest extends TestCase
{
    /**
     * @test testTextInParagraph display a text inside a paragraph
     */
    public function testTextInParagraph()
    {
        $this->assertEquals((string) new Paragraph((new Text('hello world'))), '<p>hello world</p>');
    }
    /**
     * @test testDisplayParagraph display a text in italic inside a paragraph
     */
    public function testDisplayParagraph()
    {
        $this->assertEquals((string) new Paragraph((new Italic(new Text('hello world')))), '<p><em>hello world</em></p>');
    }
}
