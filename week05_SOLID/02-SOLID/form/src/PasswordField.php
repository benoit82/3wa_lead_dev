<?php

namespace Form;

class PasswordField extends Input implements Storable
{
    static string $type = "password";
    private int $minLenght = 8;

    public function toHtml(): string
    {
        $str = "<label>" . $this->label;
        $str .= "<input type=\"" . self::$type . "\" name=\"{$this->name}\" ";
        $str .= "value=\"{$this->value}\" ";
        $str .= "minlength=\"{$this->minLength}\" ";
        if (count($this->class) > 0) $str .= "class=\"{$this->classToString()}\"";
        $str .= $this->isRequired ? " required" : "";
        $str .= " /></label>";
        return $str;
    }

    /**
     * Get the value of minLenght
     *
     * @return  mixed
     */
    public function getMinLenght()
    {
        return $this->minLenght;
    }

    /**
     * Set the value of minLenght
     *
     * @param   mixed  $minLenght  
     *
     * @return  self
     */
    public function setMinLenght($minLenght)
    {
        $this->minLenght = $minLenght;

        return $this;
    }
}
