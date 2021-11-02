<?php

namespace App;

use SplObserver;
use SplSubject;

define("FILE_LOG", __DIR__ . DIRECTORY_SEPARATOR . 'log.txt');

class LogFile implements SplObserver
{

    public function update(SplSubject $subject)
    {
        if ($subject instanceof Cart) file_put_contents(FILE_LOG, $subject->total());
    }

    public function getTotalFromFile(): float
    {
        return (float) file_get_contents(FILE_LOG);
    }
}
