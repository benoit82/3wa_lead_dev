<?php

class Timer
{
    private string $format = 'd/m/y';
    private string $date;

    public function __construct(string $date)
    {
        $this->date = $date;
    }

    public function date(): string
    {
        return (new DateTime($this->getDate()))->format($this->format);
    }

    public function getDate()
    {
        return $this->date;
    }
}
