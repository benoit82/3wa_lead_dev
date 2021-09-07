<?php

class ShippingBike extends Shipping
{
    public function __construct()
    {
        $this->price = 20;
    }

    public function getCost(Order $order): float
    {
        return $order->cost();
    }
}
