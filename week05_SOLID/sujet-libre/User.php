<?php

class User
{
    public function __construct(
        private string $name,
        private int $age,
    ) {
        # code...
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->age} ans";
    }

    /**
     * Get the value of name
     *
     * @return  mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param   mixed  $name  
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of age
     *
     * @return  mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @param   mixed  $age  
     *
     * @return  self
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }
}
