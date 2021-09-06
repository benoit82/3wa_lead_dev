<?php

namespace Parking;

abstract class Vehicule
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract static public function setSpeed(float $s): void;

    public function getName(): string
    {
        return $this->name;
    }
}
