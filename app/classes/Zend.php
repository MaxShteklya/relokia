<?php

namespace classes;

use classes\Ticket;

class Zend
{
    public $data;

    function __construct() {

        $ticket = new Ticket;
        $tickets = $ticket->getTicketsData();

        //dd($tickets);
        $this->pushInCSV($tickets);
        echo "Done.";
    }

    public function pushInCSV($data) {
        $file = fopen('file.csv', 'w');

        $a = [ [
            'Ticket ID',
            'Description',
            'Status',
            'Priority',
            'Agent ID',
            'Agent Name',
            'Agent Email',
            'Contact ID',
            'Contact Name',
            'Contact Email',
            'Group ID',
            'Group Name',
            'Company ID',
            'Company Name',
            'Comments'
        ] ];

        foreach($data as $ticket) {
            $row = array(
                $ticket['id'],
                $ticket['description'],
                $ticket['status'],
                $ticket['priority'],
                $ticket['agent_id'],
                $ticket['agent_name'],
                $ticket['agent_email'],
                $ticket['contact_id'],
                $ticket['contact_name'],
                $ticket['contact_email'],
                $ticket['group_id'],
                $ticket['group_name'],
                $ticket['company_id'],
                $ticket['company_name'],
                implode("\n", $ticket['comments'])
            );

            array_push($a, $row);
        }

        foreach ($a as $fields) {
            fputcsv($file, $fields);
        }
        fclose($file);
    }


}