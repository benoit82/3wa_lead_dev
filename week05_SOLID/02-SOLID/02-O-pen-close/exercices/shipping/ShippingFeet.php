<?php

class ShippingFeet extends Shipping
{
    public function __construct()
    {
        $this->price = 15;
    }

    public function getCost(Order $order): float
    {
        return 12345;
    }
}
