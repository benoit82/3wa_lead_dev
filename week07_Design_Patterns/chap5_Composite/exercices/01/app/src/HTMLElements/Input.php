<?php

namespace App\HTMLElements;

class Input implements HtmlElementInterface {

    public function __construct(
        private string $name,
        private string $placeholder,
        private string $type
    )
    {
    }

    public function __toString(): string
    {
        return "<input type=\"{$this->type}\" name=\"{$this->name}\" placeholder=\"{$this->placeholder}\" />";
    }
}