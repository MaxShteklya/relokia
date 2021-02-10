<?php


namespace classes\FreshClasses;

use classes\FreshClasses\GetByApi;
use classes\FreshClasses\Contact;

class Ticket extends GetByApi
{
    public function getTicketsData() {
        $data = [];
        $date = "2020-01-01";
        $page = 1;
        do{
            $getTickets = GetByApi::get('/api/v2/tickets?updated_since=' . $date . '&order_by=updated_at&order_type=asc&per_page=30&page=' . $page);
            foreach ($getTickets as $ticket) {
                $contact = new Contact;
                $contactData = $contact->getData($ticket->requester_id);
                $email = $contactData['email'];
                $name = $contactData['name'];
                $ticket->customer_email=$email;
                $ticket->customer_name=$name;
                array_push($data, $ticket);
            }
            if($page == 3){
                $date = end($getTickets)->created_at;
                $page = 1;
            }else $page++;

            if(empty($getTickets)) break;
        }while(true);

        return $data;
    }

    public function getTicketsByCompanyID($id) {
        $data = [];
        $date = "2020-01-01";
        $page = 1;
        do{
            $getTickets = GetByApi::get('/api/v2/tickets?company_id='.$id.'&updated_since=' . $date . '&order_by=updated_at&order_type=asc&per_page=30&page=' . $page);
            foreach ($getTickets as $ticket) {
                array_push($data, $ticket);
            }
            if($page == 3){
                $date = end($getTickets)->created_at;
                $page = 1;
            }else $page++;

            if(empty($getTickets)) break;
        }while(true);

        return $data;
    }
}