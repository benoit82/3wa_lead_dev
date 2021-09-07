<?php
class Product
{
    public function __construct(
        protected string $name,
        protected float $price
    ) {
    }

    public function priceTTC(float $price, float $tva)
    {
        return $price * (1 + $tva);
    }
}
