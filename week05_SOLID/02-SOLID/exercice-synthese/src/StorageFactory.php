<?php

namespace CartSystem;

use Exception;

class StorageFactory
{
    public static function create(string $name = "array")
    {
        return match (strtolower($name)) {
            "array" => new StorageArray,
            "session" => new StorageSession,
            default => throw new Exception("Bad arg.")
        };
    }
}
