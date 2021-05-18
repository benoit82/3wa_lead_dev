<?php
function fibonacci($u, $v)
{
    static $n = 0;
    while ($n < 10) {
        if ($n === 0) {
            echo "$u $v ";
        }
        echo $u + $v . " ";
        $n++;
        fibonacci($v, $u + $v);
    }
}

fibonacci(1, 1);
