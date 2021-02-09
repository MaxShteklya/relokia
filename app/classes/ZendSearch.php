<?php

namespace classes;

use classes\Ticket;

class ZendSearch extends GetByApi
{
    public $data;

    function __construct() {
        $date = "2020-01-01";
        do{
            $page = 1;
            $getTickets = GetByApi::get('/api/v2/search.json?query=created>' . $date . '&page=' . $page)->tickets;
            //TODO: Check if exists tickets. If not - break

            dd($getTickets);
            if($page == 10){
                //TODO: Get last date. Update varible

            }
            $page++;
        }while(true);

    }


}