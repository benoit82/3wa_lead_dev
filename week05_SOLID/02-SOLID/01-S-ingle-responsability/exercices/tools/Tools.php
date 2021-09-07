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
