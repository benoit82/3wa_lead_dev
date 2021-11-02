<?php

namespace App\Oberservers;

use App\Cart;
use SplObserver;
use SplSubject;


class LogFile implements SplObserver
{
    private static $fileLog = __DIR__ . '/../..' . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . 'cartTotal.txt';

    public function update(SplSubject $subject)
    {
        if ($subject instanceof Cart) file_put_contents(self::$fileLog, $subject->total());
    }

    public function getTotalFromFile(): float
    {
        return (float) file_get_contents(self::$fileLog);
    }
}
