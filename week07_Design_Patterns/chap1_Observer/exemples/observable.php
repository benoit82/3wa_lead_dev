<?php

class User implements SplSubject
{

    private $id;

    public function attach(SplObserver $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer)
    {
    }

    public function notify()
    {

        foreach ($this->observers as $value) {
            $value->update($this);
        }
    }

    public function create(string $name, string $email): void
    {

        $this->id = uniqid(true); // quelque chose s'est passé dans la classe User que l'on souhaite notifier
        $this->notify();
    }

    public function getId()
    {
        return $this->id;
    }
}

class Log implements SplObserver
{

    public function update(SplSubject $subject)
    {
        echo "log :" . $subject->getId() . PHP_EOL;
    }
}

$user = new User;

$user->attach(new Log);
$user->attach(new Log);
$user->attach(new Log);
$user->attach(new Log);

$user->create('Alan', 'alan@cochonou.fr');