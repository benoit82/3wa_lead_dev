<?php

namespace App\HTMLDecorator;

class Text implements HtmlElementInterface
{

    public function __construct(private string $name)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param   mixed  $name  
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
