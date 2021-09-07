<?php

class Music extends Product implements Productable
{
    public function getPrice(): float
    {
        return $this->priceTTC($this->price, .2);
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }
    public function getName(): string
    {
        return $this->name;
    }
}
