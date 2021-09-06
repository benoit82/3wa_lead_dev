<?php


spl_autoload_register(function ($class) {
    include __DIR__ . '/' . $class . '.php';
});

use Logger\{Log, ManageNews};

$n1 = new ManageNews(new Log, "Article PHP");
$n2 = new ManageNews(new Log, "Article MySQL");
$n3 = new ManageNews(new Log, "Article JS");
$n4 = new ManageNews(new Log, "Article MongoDB");
$n5 = new ManageNews(new Log, "Article Python");

var_dump(Log::getStorage());
