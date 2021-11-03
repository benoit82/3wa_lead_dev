<?php

namespace App\HTMLDecorator;


abstract class HtmlDecorator implements HtmlElementInterface
{
    public function __construct(protected HtmlElementInterface $element)
    {
    }
    
    public function getName()
    {
        return $this->element->getName();
    }
}