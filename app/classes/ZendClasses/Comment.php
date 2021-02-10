<?php


namespace classes\ZendClasses;

use classes\ZendClasses\GetByApi;

class Comment extends GetByApi
{
    public function getCommentsByID($id) {
        $comments = [];
        $getComments = GetByApi::get('/api/v2/tickets/' . $id . '/comments.json')->comments;
        foreach ($getComments as $comment) {
            array_push($comments, $comment->body);
        }

        return $comments;
    }
}