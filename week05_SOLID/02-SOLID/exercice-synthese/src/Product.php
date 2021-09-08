<?php

namespace CartSystem;

class Product
{
    public function __construct(
        private string $name,
        private float $price
    ) {
    }
}
