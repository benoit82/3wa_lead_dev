<?php

namespace App\Model;

use Ds\Map;


class Population
{
    private Map $storage;

    public function __construct()
    {
        $this->storage = new Map();
    }

    function addPerson(Person $p)
    {
        $this->storage->put($p->getId(), $p);
    }
}
