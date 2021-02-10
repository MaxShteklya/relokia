<?php


namespace classes\FreshClasses;

use classes\FreshClasses\GetByApi;

class Contact extends GetByApi {
    public function getData($id) {
        $data = GetByApi::get('/api/v2/contacts/' . $id);

        return [
            'email' => $data->email,
            'name' => $data->name,
            'contact_custom_fields' => $data->custom_fields
        ];
    }

}