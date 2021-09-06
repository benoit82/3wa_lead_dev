<?php

namespace Parking;

class Ferry extends Vehicule
{

    static private float $speed;
    private float $pay;
    private string $park;
    private Parking $parking;

    public function __construct(Parking $parking)
    {
        $this->parking = $parking;
    }

    static public function setSpeed(float $s): void
    {
        self::$speed = $s;
    }
}
