<?php

namespace classes;

use classes\Ticket;

class ZendSearch extends GetByApi
{
    public $data;

    function __construct() {
        $tickets = $this->getAllTicketsBySearch();
        dd($tickets);
    }

    public function getAllTicketsBySearch() {
        $data = [];
        $date = "2020-01-01";
        $page = 1;
        do{

            $getTickets = GetByApi::get('/api/v2/search.json?query=created>' . $date . ' type:ticket&page=' . $page . '&sort_by=created_at')->results;
            foreach ($getTickets as $ticket) {
                array_push($data, $ticket);
            }

            if(empty($getTickets)) break;

            if($page == 10) {
                $date = end($getTickets)->created_at;
                $page = 1;
            }else $page++;

        }while(true);

        return $data;
    }


}