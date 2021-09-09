<?php

namespace Form;

class SubmitInput extends Input
{
    static string $type = "submit";

    public function toHtml(): string
    {
        $str = "<input type=\"" . self::$type . "\" name=\"{$this->name}\" ";
        $str .= "value=\"{$this->label}\" ";
        if (count($this->class) > 0) $str .= "class=\"{$this->classToString()}\"";
        $str .= " />";
        return $str;
    }
}
