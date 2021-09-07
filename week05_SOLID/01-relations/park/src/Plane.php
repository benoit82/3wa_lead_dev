<?php

namespace Park;

final class Plane extends Vehicule
{
    protected string $category;
    static private string $speed;

    private function setCaterogy(string $category): void
    {
        $this->category = $category;
    }

    public function __toString()
    {
        return "Name: {$this->name}, Engine: {$this->engine}, Status: {$this->status}, Category: {$this->category}";
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
