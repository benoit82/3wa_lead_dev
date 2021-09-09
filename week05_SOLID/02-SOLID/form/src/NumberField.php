<?php

namespace Form;

class NumberField extends Input implements Storable
{
    static string $type = "number";
    private int $min = 0;
    private int $max = 100;

    public function toHtml(): string
    {
        $str = "<label for=\"{$this->id}\">" . $this->label;
        $str += "<input type=\"" . self::$type . "\" name=\"{$this->name}\" id=\"{$this->id}\" ";
        $str += "value=\"{$this->value}\" ";
        $str += "min=\"{$this->min}\"";
        $str += "max=\"{$this->max}\"";
        if (count($this->class) > 0) $str += "class=\"{$this->classToString()}\"";
        $str += $this->isRequired ? " required" : "";
        $str += " /></label>";
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
