<?php


namespace classes\ZendClasses;

use classes\ZendClasses\GetByApi;
use classes\ZendClasses\Agent;
use classes\ZendClasses\Contact;
use classes\ZendClasses\Group;
use classes\ZendClasses\Company;
use classes\ZendClasses\CustomField;

class Ticket extends GetByApi
{
    public function getTicketsData() {
        $data = array();
        $page = 1;
        $i = 0;
        while(true) {
            $getTickets = GetByApi::get('/api/v2/tickets.json?page=' . $page);

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

                $j = 0;
                $fields = $ticket->custom_fields;
                foreach ($fields as $field){
                    $fieldId = $field->id;
                    $titleField = new CustomField;
                    $title = $titleField->getFieldTitleByID($fieldId);
                    $value = $field->value;

                    $data[$i]['fields'][$j]['title'] = $title;
                    $data[$i]['fields'][$j]['value'] = $value;
                    $j++;
                }

                $i++;
                //break;
            }
            //break;
            if(empty($getTickets->next_page)) break;
            $page++;
        }

        return $data;
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