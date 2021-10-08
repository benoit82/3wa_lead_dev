<?php

namespace App;

use InvalidArgumentException;

class Message
{

    public function __construct(private string $message = "")
    {
    }

    public function addMessage($message): void
    {
        if (gettype($message) !== "string") throw new InvalidArgumentException;
        $this->message .= ($this->message !== "" ? " " : "") . $message;
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
