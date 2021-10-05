<?php

namespace App;

class User {

    private string $username;
    private string $createdAt;
    private int $id;

    public function __set($name, $value):void
    {
        $this->$name = $value;
    }

    public function __get(string $name):string
    {
        return $this->$name;
    }

}