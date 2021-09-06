<?php

namespace Parking;

class Plane extends Vehicule
{

    static private float $speed;
    private float $pay;
    private string $park;

    static public function setSpeed(float $s): void
    {
        self::$speed = $s;
    }
}
