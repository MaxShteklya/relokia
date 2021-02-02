<?php

require_once 'vendor/autoload.php';

use classes\Zend;

spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class).'.php';
    if(file_exists($path))
        require $path;
});

$zend = new Zend;

function dd($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}