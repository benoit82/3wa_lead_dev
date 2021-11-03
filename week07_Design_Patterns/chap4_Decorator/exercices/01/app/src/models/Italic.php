<?php

namespace App\models;

use App\abstracts\HtmlDecorator;
use App\interfaces\HtmlElement;

class Italic extends HtmlDecorator
{

    public function __construct(protected HtmlElement $element)
    {
    }

    public function __toString(): string
    {
        return "<em>{$this->element}</em>";
    }

}
