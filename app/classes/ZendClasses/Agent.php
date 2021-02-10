<?php


namespace classes\ZendClasses;

use classes\ZendClasses\GetByApi;

class Agent extends GetByApi
{
    public function getAgentByID($id) {
        if(!empty($id)) {
            $agent = GetByApi::get('/api/v2/users/' . $id . '.json')->user;
            $name = $agent->name;
            $email = $agent->email;
        } else {
            $name = NULL;
            $email = NULL;
        }

        return [
            'name' => $name,
            'email' => $email
        ];
    }
}