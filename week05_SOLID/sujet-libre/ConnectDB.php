<?php

class ConnectDB
{
    public function __construct(
        private bool $connect = true
    ) {
    }

    /**
     * Get the value of connect
     *
     * @return  mixed
     */
    public function getConnect()
    {
        return $this->connect;
    }

    /**
     * Set the value of connect
     *
     * @param   mixed  $connect  
     *
     * @return  self
     */
    public function setConnect($connect)
    {
        $this->connect = $connect;

        return $this;
    }
}
