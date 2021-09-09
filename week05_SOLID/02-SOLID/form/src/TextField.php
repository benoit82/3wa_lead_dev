<?php

namespace Form;

class TextField extends Input implements Storable
{
    static string $type = "text";

    public function toHtml(): string
    {
        $str = "<label for=\"{$this->id}\">" . $this->label;
        $str += "<input type=\"" . self::$type . "\" name=\"{$this->name}\" id=\"{$this->id}\" ";
        $str += "value=\"{$this->value}\" ";
        if (count($this->class) > 0) $str += "class=\"{$this->classToString()}\"";
        $str += $this->isRequired ? " required" : "";
        $str += " /></label>";
        return $str;
    }
}
