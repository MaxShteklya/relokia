<?php


namespace classes;

use GuzzleHttp\Client;

abstract class GetByApi
{
    private $url = 'https://shipweb.zendesk.com';
    private $auth = ['auth' => ['maks.shtieklia@gmail.com', 'Rikoriko955']];

    public function get($api) {
        $client = new Client();
        $response = $client->request('GET', $this->url.$api, $this->auth);

        $tickets = json_decode($response->getBody());
        return $tickets;
    }

}