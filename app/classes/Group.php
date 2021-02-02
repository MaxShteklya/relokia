<?php


namespace classes;

use classes\GetByApi;

class Group extends GetByApi
{
    public function getGroupNameByID($id) {
        if(!empty($id)) {
            $group = GetByApi::get('/api/v2/groups/' . $id . '.json')->group;
            $groupName = $group->name;
        } else $groupName = NULL;

        return $groupName;
    }
}