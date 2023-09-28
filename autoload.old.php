<?php
    spl_autoload_register(function($class){
        $paths = [
            join(DIRECTORY_SEPARATOR, [__DIR__]),
            join(DIRECTORY_SEPARATOR, [__DIR__, 'App\Service']),
            join(DIRECTORY_SEPARATOR, [__DIR__, 'App\Utils']),
            join(DIRECTORY_SEPARATOR, [__DIR__, 'App\Model']),
            join(DIRECTORY_SEPARATOR, [__DIR__, 'App\Controller']),
            join(DIRECTORY_SEPARATOR, [__DIR__, 'App\Manager']),
            join(DIRECTORY_SEPARATOR, [__DIR__, 'App\Vue']),
            join(DIRECTORY_SEPARATOR, [__DIR__, '..', 'App'])
        ];
        foreach($paths as $path){
            $file = join(DIRECTORY_SEPARATOR, [$path, $class.'.php']) ;
            if(file_exists($file))
                return require_once $file;
        }
    });
?>