<?php

class Log {
    static private array $storage;
    static private int $count = 0;

    static public function addLog(string $title): void {
        self::$storage[] = (new DateTime())->format('d/m/y H:m:s') . " : " . $title;
        self::$count++;
    }

    static public function getStorage(): array {
        return self::$storage;
    }
}