<?php

namespace App;

class Queue
{

    public function __construct(
        private array $pile = []
    ) {
    }

    public function push(int $numb)
    {
        $this->pile[] = $numb;
    }
    public function pop(): int | string
    {
        if (empty($this->pile)) return "La queue est vide." . PHP_EOL;
        return array_shift($this->pile) . PHP_EOL;
    }
    public function clear(): void
    {
        $this->pile = [];
    }
}
