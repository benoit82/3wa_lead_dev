<?php

class Light
{
    private bool $status = false;

    /**
     * Get the value of status
     *
     * @return  bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @param   bool  $status  
     *
     * @return  self
     */
    public function setStatus(bool $status)
    {
        $this->status = $status;

        return $this;
    }
}
