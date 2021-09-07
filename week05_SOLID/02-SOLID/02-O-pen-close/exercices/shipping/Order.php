<?php

class Order
{
    private Shipping $shipping;
    protected float $weight;

    public function __construct(Shipping $shipping, float $weight)
    {
        $this->shipping = $shipping;
        $this->weight = $weight;
    }

    public function cost(): float
    {
        return $this->shipping->getPrice() * $this->weight;
    }
}
