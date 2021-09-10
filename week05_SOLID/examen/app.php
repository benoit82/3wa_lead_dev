<?php

spl_autoload_register(function ($class) {
    include __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
});

function statusConnection(bool $connection): void
{
    $c = (new ConnectDB())->setConnect($connection);

    $userService = new UserService();
    try {
        $userService->hydrateUsers($c);
        echo $userService->getUsers();

        $nUser = new User("Benoit", 39);
        echo "---" . PHP_EOL;
        echo "Ajout du nouvel utilisateur : {$nUser}" . PHP_EOL;
        echo "---" . PHP_EOL;
        $userService->addUser($nUser);
        $userService->saveUsers($c);
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
}

echo "===SANS CONNECTION===" . PHP_EOL;
statusConnection(false);
echo "===AVEC CONNECTION===" . PHP_EOL;
statusConnection(true);
