<?php


namespace classes\ZendClasses;

use classes\ZendClasses\GetByApi;

class Contact extends GetByApi
{
    public function getContactByID($id) {
        if(!empty($id)) {
            $contact = GetByApi::get('/api/v2/users/' . $id . '.json')->user;
            $name = $contact->name;
            $email = $contact->email;
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