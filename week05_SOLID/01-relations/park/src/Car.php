<?php

namespace Park;

final class Car extends Vehicule
{

    protected string $park;
    static private string $speed;

    public function park(string $address, $place): void
    {
        $this->park = $address . ", place: " . $place;
    }

    public function __toString(): string
    {
        return "Name: {$this->name}, Engine: {$this->engine}, Status: {$this->status}, Park address: {$this->park}";
    }

    public static function setSpeed(float $speed): void
    {
        self::$speed = $speed;
    }

    public function speed(): float
    {
        return self::$speed;
    }
}
