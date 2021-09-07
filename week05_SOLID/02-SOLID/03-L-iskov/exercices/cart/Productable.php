<?php

interface Productable
{
    public function getPrice(): float;
    public function setPrice(float $price);
    public function getName(): string;
}
