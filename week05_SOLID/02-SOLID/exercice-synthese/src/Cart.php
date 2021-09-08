<?php

namespace CartSystem;

class Cart
{
    public function __construct(private float $tva,
    private Storable $storage)
    {
    }

    public function buy(Productable $prod, int $qte)
    {
        $ttc = $prod->getPrice() * (1 + $this->tva) * $qte;
        $this->storage->setValue($prod->getName(),$ttc);
    }
}
