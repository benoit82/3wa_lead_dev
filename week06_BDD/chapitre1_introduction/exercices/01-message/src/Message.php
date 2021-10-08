<?php

namespace App;

use TypeError;

class Message
{

    public function __construct(private string $message = "")
    {
    }

    public function addMessage(string $message): void
    {
        if (is_numeric($message)) throw new TypeError("Erreur de type pour le message attendu (numérique reçu)");
        $this->message .= ($this->message !== "" ? " " : $this->message) . $message;
    }


    public function getMessageToUpperCase(): string
    {
        return strtoupper($this->message);
    }

    /**
     * Get the value of message
     *
     * @return  mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @param   mixed  $message  
     *
     * @return  self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}
