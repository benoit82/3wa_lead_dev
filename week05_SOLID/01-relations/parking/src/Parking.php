<?php

namespace Parking;

class Parking
{
    private array $park = [];
    static private int $count = 0;

    public function addPark(Parkable $parkable): void
    {
        $parkable->pay(10);
        $this->park[] = $parkable;
        self::$count++;
    }

    public function removePark(Parkable $parkable): void
    {
        if (count($this->park) > 0) {
            $this->park = array_filter($this->park, function (Parkable $p) use ($parkable) {
                return $p !== $parkable;
            });
            self::$count--;
        }
    }

    public function __toString(): string
    {
        $str = '';
        if (count($this->park) > 0) {
            foreach ($this->park as $vehicule) {
                $str .= $vehicule->getName() . PHP_EOL;
            }
        }
        return $str;
    }
}
