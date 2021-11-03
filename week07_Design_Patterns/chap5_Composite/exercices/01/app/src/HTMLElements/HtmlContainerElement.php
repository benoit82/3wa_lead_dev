<?php

namespace App\HTMLElements;

use SplObjectStorage;

abstract class HtmlContainerElement implements HtmlElementInterface {

    protected SplObjectStorage $storage;

    public function __construct()
    {
        $this->storage = new SplObjectStorage;
    }

    public function add(HtmlElementInterface $element): void
    {
        $this->storage->attach($element);
    }
}