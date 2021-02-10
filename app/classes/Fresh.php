<?php


namespace classes;

use classes\FreshClasses\Ticket;


class Fresh
{
    public function start() {
        $t = new Ticket;
        $data = $t->getTicketsData();
        dd($data);
    }
}