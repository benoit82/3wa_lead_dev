<?php

namespace App;

use Iterator;
use SplFileObject;

class ReadIterator implements Iterator
{
    private SplFileObject $file;

    public function __construct(string $path)
    {
        $this->file = new SplFileObject($path);
    }

    public function rewind()
    {
        $this->file->rewind();
    }

    public function current()
    {
        return $this->file->current();
    }

    public function key()
    {
        return $this->file->key();
    }

    public function next()
    {
        $this->file->next();
    }

    public function valid()
    {
        return $this->file->valid();
    }
}
