<?php

class Light
{
    private bool $status = false;

    /**
     * Get the value of status
     *
     * @return  mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @param   mixed  $status  
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
