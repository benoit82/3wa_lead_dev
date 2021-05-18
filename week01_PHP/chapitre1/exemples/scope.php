<?php
$a = 1; /* portée globale */

// portée spécifique
function foo()
{
    echo $a; /* portée locale */
}

foo();
