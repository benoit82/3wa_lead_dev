<?php

namespace App\abstracts;

use App\interfaces\HtmlElement;

abstract class HtmlDecorator implements HtmlElement
{
    public function __construct(protected HtmlElement $element)
    {
    }
    
    public function getName()
    {
        return $this->element->getName();
    }
}