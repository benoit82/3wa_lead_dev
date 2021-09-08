<?php

namespace CartSystem;

class StorageSession implements Storable
{
    public function setValue(string $name, float $price): void
    {
        $_SESSION['cart'][$name] = $price;
    }
    public function reset(): void
    {
        $_SESSION['cart'] = [];
    }
    public function total(): float
    {
        return array_sum($_SESSION['cart']);
        
    }
    public function restore(string $name): void
    {
        $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($produit) use ($name) {
            foreach($produit as $prodName => $total) {
                return ($name !== $prodName);
            }
        })
    }
}
