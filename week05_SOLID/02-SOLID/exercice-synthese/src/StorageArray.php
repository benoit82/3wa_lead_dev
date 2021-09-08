<?php

namespace CartSystem;

class StorageArray implements Storable
{
    public function __construct(private array $store = [])
    {
    }
    public function setValue(string $name, float $price): void
    {
        $this->store[$name] = ['value' => $price];
    }
    public function reset(): void
    {
        $this->store = [];
    }
    public function total(): float
    {
        return array_reduce($this->store, function($sum, $item) {
            return $sum += $item['value'];
        },0.0);
    }
    public function restore(string $name): void
    {
        $this->store = array_filter(
            $this->store,
            function ($key) use ($name) {
                return in_array($key, [$name]);
            },
            ARRAY_FILTER_USE_KEY
        );
    }
}
