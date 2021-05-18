<?php

namespace App;

class Lamp
{

    public function __construct(
        private bool $status = false
    ) {
    }

    public function toggleStatus(): void
    {
        $this->status = !$this->status;
    }
    public function getStatus(): bool
    {
        return $this->status;
    }
}
