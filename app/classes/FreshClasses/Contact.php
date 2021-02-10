<?php


namespace classes\FreshClasses;

use classes\FreshClasses\GetByApi;

class Contact extends GetByApi {
    public function getEmail($id) {
        return GetByApi::get('/api/v2/contacts/' . $id)->email;
    }
    public function getName($id) {
        return GetByApi::get('/api/v2/contacts/' . $id)->name;
    }
}