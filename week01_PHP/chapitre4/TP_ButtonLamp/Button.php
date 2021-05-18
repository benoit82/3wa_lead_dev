<?php

namespace App;

class Button
{

    public function __construct(private Lamp $lamp)
    {
    }

    public function switchDevice(): string
    {
        $this->lamp->toggleStatus();
        return "turn " . (($this->lamp->getStatus()) ? "on" : "off") . PHP_EOL;
    }
}
