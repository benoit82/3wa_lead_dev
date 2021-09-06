<?php

namespace Parking;

class Car extends Vehicule {
    
    static private float $speed;

    static public function setSpeed(float $s): void {
        self::$speed = $s;
    }
    
    public function pay(float $price): void {
        $this->pay = $price;
    }
    public function park(string $address, string $place): void {
        $this->park = $address . " @". $place . PHP_EOL;
    }
}