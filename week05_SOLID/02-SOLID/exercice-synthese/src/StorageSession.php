<?php

namespace CartSystem;

class StorageSession implements Storable
{
    public function setValue(string $name, float $price): void
    {
        $_SESSION['cart'][$name] = ['value' => $price];
    }
    public function reset(): void
    {
        $_SESSION['cart'] = [];
    }
    public function total(): float
    {
        return array_reduce($_SESSION['cart'], function ($sum, $item) {
            return $sum += $item['value'];
        }, 0.0);
    }
    public function restore(string $name): void
    {
        $_SESSION['cart'] = array_filter(
            $_SESSION['cart'],
            function ($key) use ($name) {
                return in_array($key, [$name]);
            },
            ARRAY_FILTER_USE_KEY
        );
    }
}
