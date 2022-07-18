<?php

spl_autoload_register(function ($class) {
    // var_dump($class);
    $racine = realpath($_SERVER['DOCUMENT_ROOT']);
    $class = str_replace('\\', '/', $class) . ".php";
    echo "</pre>";
    if (file_exists($class)) {
        require_once $class;
    } else {
        $dossiers = preg_grep('/^([^.])/', scandir(realpath($racine)));
        foreach ($dossiers as $dossier) {
            if (is_dir($dossier)) {
                $classPath = "{$dossier}/{$class}";
                if (file_exists($classPath)) {
                    require_once($classPath);
                }
            }
        }
        // var_dump('Error : ' . $class );
    }
});
