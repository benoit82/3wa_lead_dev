<?php

namespace Parking;

class Byke extends Vehicule implements Parkable
{

    static private float $speed;
    private float $pay;
    private string $park;

    public function __construct($name)
    {
        parent::__construct($name);
    }

    static public function setSpeed(float $s): void
    {
        self::$speed = $s;
    }

    public function pay(float $price): void {
        $this->pay = $price;
    }
    public function park(string $address, string $place): void {
        $this->park = $address . " @". $place . PHP_EOL;
    }
}
