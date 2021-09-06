<?php

namespace Logger;

class Log {
    static private array $storage;
    static private int $count;

    static public function addLog(string $date): void {
        array_push(self::$storage, $date);
        self::$count++;
    }

    static public function getStorage(): array {
        return self::$storage;
    }
}