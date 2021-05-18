<?php
/*
En utilisant l'expression match de PHP implémentez l'algorithme de FizzBuzz :

Pour les nombres de 1 à 100 compris.

- Pour les multiples de 3, affichez Fizz au lieu du nombre.
- Pour les multiples de 5, affichez Buzz au lieu du nombre.
- Pour les nombres multiples de 3 et 5, affichez uniquement FizzBuzz.
*/
function fizzbuzz(): string
{
    $str = "";
    for ($i = 1; $i <= 100; $i++)
        $str .= match (0) {
            $i % 15 => "FizzBuzz ",
            $i % 5  => "Buzz ",
            $i % 3  => "Fizz ",
            default => "$i ",
        };
    return $str;
}


echo fizzbuzz();
