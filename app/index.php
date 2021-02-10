<?php
require_once 'vendor/autoload.php';

use classes\Zend;
use classes\ZendClasses\Ticket;

use classes\Fresh;

spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class).'.php';
    if(file_exists($path))
        require $path;
});

//$zend = new Zend;
//$zend->updateCSV();

//$t = new Ticket;
//$tickets = $t->getTicketsData();
//$tickets = $t->getAllTicketsBySearch();
//dd($tickets);


$fresh = new Fresh;
$fresh->start();

function dd($var){
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}