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

    public function operation(): string
    {
        if ($this->storage->count() === 0) throw new Exception("Empty Form");

        $elements = parent::operation();

        return "<form name=\"{$this->name}\" action=\"{$this->action}\">$elements</form>";
    }
}
