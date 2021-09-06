<?php

namespace Park;
use \Park\Vehicule;

final class Plane extends Vehicule {
    protected string $category;
    static private float $speed;

    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    private function setCaterogy(string $category):void {
        $this->category = $category;
    }

    public function __toString()
    {
        echo "Name: {$this->name}, Engine: {$this->engine}, Status: {$this->status}, Category: {$this->category}";
    }

    private static function setSpeed(float $speed): void {
        Plane::$speed = $speed;
    }

    public function speed(): float {
        return Plane::$speed;
    }
}