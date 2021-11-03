<?php

namespace App\HTMLElements;

use Exception;

class Form extends HtmlContainerElement
{
    public function __construct(
        private string $name,
        private string $action
    ) {
        parent::__construct();
    }

    public function __toString(): string
    {
        if ($this->storage->count() === 0) throw new Exception("Empty Form");

        $elements = '';

        foreach ($this->storage as $element) {
            $elements .= (string) $element;
        }

        return "<form name=\"{$this->name}\" action=\"{$this->action}\">$elements</form>";
    }
}
