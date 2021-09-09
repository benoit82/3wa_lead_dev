<?php

namespace Form;

class NumberField extends Input implements Storable
{
    static string $type = "number";
    private int $min;
    private int $max;

    public function toHtml(): string
    {
        $str = "<label>" . $this->label;
        $str .= "<input type=\"" . self::$type . "\" name=\"{$this->name}\" ";
        $str .= "value=\"{$this->value}\" ";
        if (isset($this->min)) $str .= "min=\"{$this->min}\"";
        if (isset($this->max)) $str .= "max=\"{$this->max}\"";
        if (count($this->class) > 0) $str .= "class=\"{$this->classToString()}\"";
        $str .= $this->isRequired ? " required" : "";
        $str .= " /></label>";
        return $str;
    }

    /**
     * Get the value of min
     *
     * @return  mixed
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * Set the value of min
     *
     * @param   mixed  $min  
     *
     * @return  self
     */
    public function setMin($min)
    {
        $this->min = $min;

        return $this;
    }

    /**
     * Get the value of max
     *
     * @return  mixed
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * Set the value of max
     *
     * @param   mixed  $max  
     *
     * @return  self
     */
    public function setMax($max)
    {
        $this->max = $max;

        return $this;
    }
}
