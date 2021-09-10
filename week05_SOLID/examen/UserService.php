<?php

class UserService
{
    private splObjectStorage $userStorage;

    public function __construct()
    {
        $this->userStorage = new SplObjectStorage;
    }

    public function saveUsers(ConnectDB $c): void
    {
        if ($c->getConnect()) {
            $this->userStorage->rewind();
            while ($this->userStorage->valid()) {
                $this->saveUser($this->userStorage->current());
                $this->userStorage->next();
            }
        } else {
            throw new Exception("Erreur : Connection à la DB échoué." . PHP_EOL);
        }
    }

    public function hydrateUsers(ConnectDB $c): void
    {
        if ($c->getConnect()) {
            $this->addUser(new User("Walter", 54));
            $this->addUser(new User("Marion", 16));
            $this->addUser(new User("Edouard", 34));
        } else {
            throw new Exception("Erreur : Connection à la DB échoué." . PHP_EOL);
        }
    }

    public function addUser(User $u): void
    {
        $this->userStorage->attach($u);
    }

    private function saveUser(User $u): void
    {
        echo "{$u} : sauvegardé !" . PHP_EOL;
    }

    public function getUsers(): string
    {
        $str = "---Utilisateurs enregistrés---" . PHP_EOL;
        $this->userStorage->rewind();
        while ($this->userStorage->valid()) {
            $str .= $this->userStorage->current() . PHP_EOL;
            $this->userStorage->next();
        }
        $str .= "---Fin de la liste---" . PHP_EOL;
        return $str;
    }
}
