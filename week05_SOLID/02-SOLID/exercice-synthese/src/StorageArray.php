<?php

namespace CartSystem;

class StorageArray implements Storable
{
    public function __construct(private array $store)
    {
    }
    public function setValue(string $name, float $price): void
    {
        $this->store = $price;
    }
    public function reset(): void
    {
        $this->store = [];
    }
    public function total(): float
    {
        return array_sum($this->store);
        
    }
    public function restore(string $name): void
    {
        $this->store = array_filter($this->store, function ($produit) use ($name) {
            foreach($produit as $prodName => $total) {
                return ($name !== $prodName);
            }
        })
    }
}
