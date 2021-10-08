<?php

namespace App;

use Exception, Throwable;

class MemoryException extends Exception
{
    public function __construct($message = "sum results under 200", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return "{$this->message}\n";
    }
}
