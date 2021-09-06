<?php

namespace Park;

abstract class Vehicule {
    private string $name;
    private string $status;
    private string $engine;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function speed(): float;
    abstract public function __toString(): string;

    public function setStatus(string $status): void {
        $this->status = $status;
    }
    public function setEngine(string $engine): void {
        $this->engine = $engine;
    }
}