<?php


namespace classes\FreshClasses;

use classes\FreshClasses\GetByApi;
use classes\FreshClasses\Contact;

class Ticket extends GetByApi
{
    public function getTicketsData() {
        $getTickets = GetByApi::get('/api/v2/tickets');
        foreach ($getTickets as $ticket) {
            $contact = new Contact;
            $email = $contact->getEmail($ticket->requester_id);
            $name = $contact->getName($ticket->requester_id);
            $ticket->customer_email=$email;
            $ticket->customer_name=$name;
            //break;
        }

        return $getTickets;
    }

//    public function getAllTicketsBySearch() {
//        $data = [];
//        $date = "2020-01-01";
//        $page = 1;
//        do{
//
//            $getTickets = GetByApi::get('/api/v2/search.json?query=created>' . $date . ' type:ticket&page=' . $page . '&sort_by=created_at')->results;
//            foreach ($getTickets as $ticket) {
//                array_push($data, $ticket);
//            }
//
//            if(empty($getTickets)) break;
//
//            if($page == 10) {
//                $date = end($getTickets)->created_at;
//                $page = 1;
//            }else $page++;
//
//        }while(true);
//
//        return $data;
//    }
}