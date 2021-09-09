<?php

namespace Form;

abstract class Input
{
    public function __construct(
        private string $name,
        private string $label,
        private string $value,
        private array $class = [],
        private bool $isRequired = false,
    ) {
    }

    public function classToString(): string
    {
        $str = '';
        foreach ($this->class as $c) {
            $str += "{$c} ";
        }
        return trim($str);
    }

    abstract public function toHtml(): string;

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
     * Get the value of label
     *
     * @return  mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of label
     *
     * @param   mixed  $label  
     *
     * @return  self
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get the value of value
     *
     * @return  mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @param   mixed  $value  
     *
     * @return  self
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }


    /**
     * Get the value of class
     *
     * @return  mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set the value of class
     *
     * @param   mixed  $class  
     *
     * @return  self
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get the value of isRequired
     *
     * @return  mixed
     */
    public function getIsRequired()
    {
        return $this->isRequired;
    }

    /**
     * Set the value of isRequired
     *
     * @param   mixed  $isRequired  
     *
     * @return  self
     */
    public function setIsRequired($isRequired)
    {
        $this->isRequired = $isRequired;

        return $this;
    }
}
