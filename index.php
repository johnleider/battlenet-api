<?php

require_once __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;

$api_key = '';

$client = new Client();

$response = $client->get('https://us.api.battle.net/d3/profile/zeroskillz-1838/?locale=en_US&apikey=' . $api_key, ['verify' => false]);
class BattleNet
{
    protected $apikey = '';
    protected $base_uri = 'api.battle.net';
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
           'base_uri' => $this->base_uri
        ]);
    }
}