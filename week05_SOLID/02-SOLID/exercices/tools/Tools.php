<?php

class Tools
{
    private Router $router;
    private Timer $timer;
    private Token $token;



    public function getToken()
    {
        return $this->token;
    }

    public function setToken(Token $token)
    {
        $this->token = $token;

        return $this;
    }

    public function getTimer()
    {
        return $this->timer;
    }

    public function setTimer(Timer $timer)
    {
        $this->timer = $timer;

        return $this;
    }

    public function getRouter()
    {
        return $this->router;
    }

    public function setRouter(Router $router)
    {
        $this->router = $router;

        return $this;
    }
}

class Token
{

    private $max = 10;

    public function token(): string
    {

        return random_bytes($this->max);
    }
}

class Timer
{
    private string $format = 'd/m/y';
    private string $date;

    public function __construct(string $date)
    {
        $this->date = $date;
    }

    public function date(): string
    {
        return (new DateTime($this->getDate()))->format($this->format);
    }

    public function getDate()
    {
        return $this->date;
    }
}

class Router
{

    public function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}
