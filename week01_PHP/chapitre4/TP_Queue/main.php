<?php

require_once __DIR__ . '/Queue.php';

$queue = new App\Queue();
$queue->push(1);
$queue->push(2);
$queue->push(3);
echo $queue->pop(); // affiche 1
echo $queue->pop(); // affiche 2
$queue->clear(); // retire tous les éléments de la queue
echo $queue->pop(); // affiche "La queue est vide."