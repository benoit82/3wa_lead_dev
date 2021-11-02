<?php

namespace App;

use SplObserver;
use SplSubject;

class LogSum implements SplObserver {
    public function update(SplSubject $subject)
    {
        if ($subject instanceof Cart) $this->storageSums[] = $subject->total();
    }

    public function getLastTotal(): float
    {
        return (float) end($this->storageSums);
    }
}