<?php
function fibonacci($u, $v)
{
    static $n = 0;
    while ($n < 50) {
        echo $u + $v . " ";
        $n++;
        fibonacci($v, $u + $v);
    }
}

fibonacci(0, 1);
