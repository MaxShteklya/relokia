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


//$fresh = new Fresh;
//$fresh->start();
if($_POST) {
    if(!empty($_POST['id'])){
        $fresh = new Fresh;
        $result = $fresh->search($_POST['id']);
        if(empty($result)) echo "Nothing not founded";
        else dd($result);
    }
}

function dd($var){
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

?>

<form action="#" method="post">
    <input type="text" name="id" placeholder="Company ID">
    <input type="submit" value="Search">
</form>
