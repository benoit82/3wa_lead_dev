<?php

abstract class Shipping
{
    protected float $price;
    
    abstract public function getCost(Order $order): float;

    public function getPrice(): float
    {
        return $this->price;
    }
}
