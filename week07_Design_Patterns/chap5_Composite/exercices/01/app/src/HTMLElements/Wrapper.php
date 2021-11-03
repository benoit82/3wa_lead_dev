<?php

namespace App\HTMLElements;

use Exception;

class Wrapper extends HtmlContainerElement
{

    public function __construct()
    {
        parent::__construct();
    }

    public function __toString(): string
    {
        if ($this->storage->count() === 0) throw new Exception("Empty Wrapper");

        $elements = '';

        foreach ($this->storage as $element) {
            $elements .= (string) $element;
        }

        return "<div>$elements</div>";
    }
}
