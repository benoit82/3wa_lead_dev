<?php

namespace App;

use SplObserver;
use SplSubject;

class LogSum implements SplObserver {
    public function update(SplSubject $subject)
    {
        if ($subject instanceof Cart) $this->sum = $subject->total();
    }

    public function getTotal()
    {
        return (float) $this->sum;
    }
}