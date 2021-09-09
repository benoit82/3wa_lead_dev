<?php

namespace Form;

abstract class Input
{
    public function __construct(
        private string $name,
        private string $label,
        private string $value,
        private string $id,
        private array $class,
        private bool $isRequired,
    ) {
    }

    public function classToString(): string
    {
        $str = '';
        foreach ($this->class as $c) {
            $str += "{$c} ";
        }
        return trim($str);
    }

    abstract public function toHtml(): string;
}
