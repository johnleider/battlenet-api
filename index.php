<?php

require_once __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;

$api_key = 'zu8dqyc8yqmnrktvr7sa2xb2fbrdegzr';

$client = new Client();

$response = $client->get('https://us.api.battle.net/d3/profile/zeroskillz-1838/?locale=en_US&apikey=' . $api_key, ['verify' => false]);

echo $response->getBody();
class BattleNet
{
    public function __construct()
    {
        $this->base_url = '';
    }
}