<?php

namespace App\Model;

class Person {

    public function __construct(
        private string $name,
        private int $id
    )
    {
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
     * Get the value of id
     *
     * @return  mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param   mixed  $id  
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}