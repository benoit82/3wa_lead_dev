<?php

class ManageNews
{
    private string $title;
    private Log $log;

    public function __construct(Log $log, string $title)
    {
        $this->title = $title;
        $this->log = $log;
        $this->log::addLog($this->title);
    }
}