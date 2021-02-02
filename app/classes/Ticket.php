<?php


namespace classes;

use classes\GetByApi;
use classes\Agent;
use classes\Contact;
use classes\Group;
use classes\Company;

class Ticket extends GetByApi
{
    public function getTicketsData() {
        $data = array();
        $page = 1;
        $i = 0;
        while(true) {
            $getTickets = GetByApi::get('/api/v2/tickets.json?page='.$page);

            foreach ($getTickets->tickets as $ticket) {
                $data[$i]['id'] = $ticket->id;
                $data[$i]['description'] = $ticket->description;
                $data[$i]['status'] = $ticket->status;
                $data[$i]['priority'] = $ticket->priority;

                $data[$i]['agent_id'] = $ticket->assignee_id;
                $agent = new Agent;
                $agent_data = $agent->getAgentByID($ticket->assignee_id);
                $data[$i]['agent_name'] = $agent_data['name'];
                $data[$i]['agent_email'] = $agent_data['email'];

                $data[$i]['contact_id'] = $ticket->submitter_id;
                $contact = new Contact;
                $contact_data = $contact->getContactByID($ticket->submitter_id);
                $data[$i]['contact_name'] = $contact_data['name'];
                $data[$i]['contact_email'] = $contact_data['email'];

                $data[$i]['group_id'] = $ticket->group_id;
                $group = new Group;
                $data[$i]['group_name'] = $group->getGroupNameByID($ticket->group_id);

                $data[$i]['company_id'] = $ticket->organization_id;
                $company = new Company;
                $data[$i]['company_name'] = $company->getCompanyNameByID($ticket->organization_id);

                $comments = new Comment;
                $data[$i]['comments'] = $comments->getCommentsByID($ticket->id);

                $i++;
            }
            if(empty($getTickets->next_page)) break;
            $page++;
        }

        return $data;
    }
}