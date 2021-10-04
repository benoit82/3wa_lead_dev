<?php

namespace Providers;

trait TraitProvider {

    public function addProvider(): array
    {
        return [
            [1, 2, 3],
            [3.31, 4.2, 7.51],
            [7, 8, 15],
            [100, 420, 520],
        ];
    }
}