<?php
function tests(string $filename)
{
    require_once $filename;
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
            echo "❌ $name : ligne $errLine --> $errArg" . PHP_EOL;
        }
    }
}

function testAll($argv)
{
    if (count($argv) < 2) {
        echo "⚠️ aucun fichier n'a été préciser !";
        die;
    }

    if (file_exists($argv[1])) {
        tests($argv[1]);
    } else {
        echo "⚠️ fichier inexistant !";
        die;
    }
}

testAll($argv);
