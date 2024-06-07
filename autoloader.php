<?php 
declare(strict_types=1);
spl_autoload_register('myAutoLoader');

function myAutoLoader (string $classname):void{
    $extension = '.class.php';
    $filename = $classname . $extension;

    if(!file_exists($filename)){
        return;
    }

    include_once $classname . $extension;
}