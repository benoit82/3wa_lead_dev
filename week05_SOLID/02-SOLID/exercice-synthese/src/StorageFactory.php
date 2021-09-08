<?php

namespace CartSystem;

use Exception;

class StorageFactory
{
    private function __construct()
    {
    }

    public static function create(string $name = "array")
    {
        return match (strtolower($name)) {
            "array" => new StorageArray,
            "session" => new StorageSession,
            default => throw new Exception("Bad arg.")
        };
    }
}
