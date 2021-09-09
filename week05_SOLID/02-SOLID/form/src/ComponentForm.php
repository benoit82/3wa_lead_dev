<?php

namespace Form;

use SplObjectStorage;

class ComponentForm
{
    public function __construct(
        private splObjectStorage $inputStorage,
        private SubmitInput $submitInput,
    ) {
        $this->submitInput->setLabel("Valider");
    }

    public function addToStorage(Storable $input): void
    {
        $this->inputStorage->attach($input);
    }
    public function displayForm(): void
    {
        echo "<form>" . PHP_EOL;
        $this->inputStorage->rewind();
        while ($this->inputStorage->valid()) {
            echo $this->inputStorage->current()->toHtml() . PHP_EOL;
            $this->inputStorage->next();
        }
        echo $this->submitInput->toHtml() . PHP_EOL;
        echo "</form>" . PHP_EOL;
    }

    public function onSubmit(): void
    {
        echo "traitement de l'envoi...";
    }
}
