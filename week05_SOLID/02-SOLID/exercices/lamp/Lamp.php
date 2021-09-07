<?php

class Lamp
{
    private Light $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function switch(): void
    {
        $this->light->setStatus(!$this->light->getStatus());
    }

    public function __toString(): string
    {
        return "La lampe est " . ($this->light->getStatus() ? "allumé" : "éteinte") . PHP_EOL;
    }
}
