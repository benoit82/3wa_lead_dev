<?php

namespace App\HTMLDecorator;

class Italic extends HtmlDecorator
{

    public function __construct(protected HtmlElementInterface $element)
    {
    }

    public function __toString(): string
    {
        return "<em>{$this->element}</em>";
    }

}
