<?php

namespace Park;
use \Park\Vehicule;

final class Car extends Vehicule {
    protected string $park;
    private string $place;
    static private float $speed;

    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    private function park(string $name, $place):void {

    }

    public function __toString()
    {
        echo "Name: {$this->name}, Engine: {$this->engine}, Status: {$this->status}, Park address: {$this->park}";
    }

    private static function setSpeed(float $speed): void {
        Car::$speed = $speed;
    }

    public function speed(): float {
        return Car::$speed;
    }

}