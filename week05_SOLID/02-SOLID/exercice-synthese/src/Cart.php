<?php

namespace CartSystem;

class Cart
{
    public function __construct(
        private float $tva,
        private Storable $storage
    ) {
    }

    public function buy(Productable $prod, int $qte)
    {
        $ttc = $prod->getPrice() * (1 + $this->tva) * $qte;
        $this->storage->setValue($prod->getName(), $ttc);
    }

    public function total(): float
    {
        return $this->storage->total();
    }
    public function restore(Productable $prod): void
    {
        $this->storage->restore($prod->getName());
    }
}
