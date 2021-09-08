<?php

class User
{
    public function __construct(private splObjectStorage $storage)
    {
    }

    public function setInterest(Interest $interest)
    {
        $this->storage->attach($interest);
    }

    public function getInterests(): string
    {
        $str = PHP_EOL;
        foreach ($this->storage as $interest) $str .= $interest->getName() . PHP_EOL;
        return $str;
    }
}
