<?php

namespace Logger;

use Logger\Log;

class ManageNews
{
    private string $title;

    public function __construct(Log $log, string $title)
    {
        $this->title = $title;
        $log->addLog("Date? : " . $this->title);
    }
}
