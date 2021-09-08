<?php
class Container
{
    public function __construct(private SplObjectStorage $storage)
    {
    }

    public function setStorage(Interest $interest, string $name)
    {
        if ($this->storage->contains($interest)) throw new InvalidArgumentException("This interest exists");
        $this->storage->attach($interest, $name);
    }

    public function getStorage(string $name): Interest
    {
        $this->storage->rewind();
        while ($this->storage->valid()) {
            if ($this->storage->getInfo() === $name) return $this->storage->current();
            $this->storage->next();
        }
    }
}
