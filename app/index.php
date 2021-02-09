<?php
require_once 'vendor/autoload.php';

use classes\Zend;
use classes\ZendSearch;

spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class).'.php';
    if(file_exists($path))
        require $path;
});

//$zend = new Zend;
$zend = new ZendSearch;

function dd($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}