<?php

class Cart
{
    protected array $storage = [];

    public function buy(Productable $p, int $quantity)
    {
        $this->storage[] += $p->getPrice() * $quantity;
    }

    public function total(): float
    {
        $sum = 0.0;
        foreach ($this->storage as $price) $sum += $price;
        return $sum;
    }
}
