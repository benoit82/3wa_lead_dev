<?php

namespace App\models;

use App\abstracts\HtmlDecorator;
use App\interfaces\HtmlElement;

class Paragraph extends HtmlDecorator
{

    public function __construct(protected HtmlElement $element)
    {
    }

    public function __toString(): string
    {
        return "<p>{$this->element}</p>";
    }

}
