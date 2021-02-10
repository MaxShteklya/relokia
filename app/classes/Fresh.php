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

    public function search($id){
        $t = new Ticket;
        return $t->getTicketsByCompanyID($id);
    }
}