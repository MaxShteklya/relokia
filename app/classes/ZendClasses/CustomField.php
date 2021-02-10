<?php


namespace classes\ZendClasses;

use classes\ZendClasses\GetByApi;

class CustomField extends GetByApi
{
    public function getFieldTitleByID($id) {
        $field = GetByApi::get('/api/v2/ticket_fields/' . $id . '.json')->ticket_field;
        return $field->title;
    }
}