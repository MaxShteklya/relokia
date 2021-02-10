<?php


namespace classes\FreshClasses;

use GuzzleHttp\Client;

abstract class GetByApi
{
    private $url = 'https://newaccount1612941891487.freshdesk.com/';
    private $auth = ['auth' => ['m.shtieklia@relokia.com', 'Rikoriko955job']];

    public function get($api) {
        //exit($this->url.$api);
        $client = new Client();
        $response = $client->request('GET', $this->url.$api, $this->auth);

        $tickets = json_decode($response->getBody());
        return $tickets;
    }

}