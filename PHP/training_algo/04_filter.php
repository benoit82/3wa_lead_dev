<?php

function filter(array $nombres, callable $fn): array
{
    $res = [];
    foreach ($nombres as $nombre) {
        $condition = $fn($nombre);
        if ($condition) $res[] = $nombre;
    }
    return $res;
}

function test_we_can_filter()
{
    $nombres = [2, 20, 1, 15, 11];

    $results = filter($nombres, function ($value) {
        return $value > 10;
    });

    assert(is_array($results));
    assert(count($results) === 3);
    assert($results[0] === 20);
    assert($results[1] === 15);
    assert($results[2] === 11);
}

function test_we_can_filter_other()
{
    $nombres = [2, 20, 1, 15, 11];

    $results = filter($nombres, function ($value) {
        return $value < 5;
    });

    assert(is_array($results));
    assert(count($results) === 2);
    assert($results[0] === 2);
    assert($results[1] === 0);
}

// test_we_can_filter();
// test_we_can_filter_other();

/**
 * Finir la journée en beauté : notre propre framework de tests !
 * 
 * 1) Renommez vos fonctions de test en séparant les mots par des _
 * Exemple : testItCanFilter devient test_it_can_filter
 * NOTE : Conservez tout de même le mot "test" en premier !
 * 
 * 2) Trouvez un moyen de récupérer toutes les fonctions qui sont définies dans ce fichier
 * 
 * 3) Trouvez un moyen de ne conserver que les fonctions qui commencent par le mot "test"
 * 
 * 4) Exécutez chaque fonction et trouvez le moyen de savoir si elle marche ou pas tout en affichant dans le terminal le résultat (Ca marche ou pas)
 * 
 * 5) Si ça ne marche pas, essayez d'informer le développeur de pourquoi ça marche pas !
 */
function testsEx4()
{
    $functions = array_filter(get_defined_functions()['user'], function ($fn) {
        return str_starts_with($fn, "test_");
    });
    echo "TESTS :" . PHP_EOL;
    foreach ($functions as $testFunction) {
        $name = str_replace('_', ' ', $testFunction);
        $name = str_replace('test ', '', $name);
        try {
            $testFunction();
            echo "✅ $name" . PHP_EOL;
        } catch (Throwable $th) {
            $errLine = $th->getTrace()[0]['line'];
            $errArg = $th->getTrace()[0]['args'][1];
            echo "❌ $name ligne $errLine --> $errArg" . PHP_EOL;
        }
    }
}
