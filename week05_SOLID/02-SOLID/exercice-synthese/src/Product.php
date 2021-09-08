<?php

namespace CartSystem;

class Product implements Productable
{
    public function __construct(
        private string $name,
        private float $price
    ) {
    }

    public function getPrice(): float
    {
        return $this->price;
    }
    public function setPrice(float $price)
    {
        $this->price = $price;
    }
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param   mixed  $name  
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
