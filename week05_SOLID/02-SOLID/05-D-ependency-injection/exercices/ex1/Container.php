<?php
class Container
{
    public function __construct(private SplObjectStorage $storage)
    {
    }

    public function setStorage(Interest $interest, string $name)
    {
        // interêt de la variable $name ?
        $this->storage->attach($interest);
    }

    public function getStorage(string $name): Interest
    {
        foreach ($this->storage as $k => $interest) {
            if ($interest->getName() === $name) {
                return $interest;
            }
        }
    }
}
