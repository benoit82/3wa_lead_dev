<?php

namespace App;

use SplObserver;
use SplSubject;

class Cart implements SplSubject
{
    private $storage;
    private $tva;

    public function __construct(array $storage = [], float $tva = 0.2)
    {
        $this->tva = $tva;
        $this->storage = $storage;
    }

    public function buy(Product $product, int $quantity): void
    {
        $total = $quantity * $product->getPrice() * ($this->tva + 1);

        $this->storage[$product->getName()] = $total;
        $this->notify();
    }

    public function reset(): void
    {
        $this->storage = [];
    }

    public function total(): float
    {
        return array_sum($this->storage);
    }

    public function restore(Product $product): void
    {
        if (isset($this->storage[$product->getName()])) {
            unset($this->storage[$product->getName()]);
            $this->notify();
        }
    }

    public function attach(SplObserver $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer)
    {
        $this->observers = array_filter($this->observers, function (SplObserver $ob) use ($observer) {
            return $ob !== $observer;
        });
    }

    public function notify()
    {

        foreach ($this->observers as $value) {
            $value->update($this);
        }
    }
}
