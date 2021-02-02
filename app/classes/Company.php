<?php


namespace classes;

use classes\GetByApi;

class Company extends GetByApi
{
    public function getCompanyNameByID($id) {
        if(!empty($id)) {
            $company = GetByApi::get('/api/v2/organizations/' . $id . '.json')->organization;
            $companyName = $company->name;
        } else $companyName = NULL;

        return $companyName;
    }
}