<?php

namespace App\HTMLDecorator;

class Paragraph extends HtmlDecorator
{

    public function __construct(protected HtmlElementInterface $element)
    {
    }

    public function __toString(): string
    {
        return "<p>{$this->element}</p>";
    }

}
