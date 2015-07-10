<?php

namespace johnleider\BattleNet;

use GuzzleHttp\Client;

class BattleNet
{
    protected $apikey = 'zu8dqyc8yqmnrktvr7sa2xb2fbrdegzr';
    protected $base_uri = 'api.battle.net';
    protected $client;
    protected $region;

    public function __construct($region)
    {
        $this->region = $region;
        $this->client = new Client([
            'base_uri' => 'https://us.api.battle.net/d3/profile/zeroskillz-1838/?locale=en_US&apikey='.$this->apikey,
            'verify'   => false
        ]);
    }

    public function fetch()
    {
       echo 'here';
    }

    public function buildUrl(array $options)
    {
    $profile = str_replace('#', '-', $options['profile']);
    return $this->game.'/profile/'.$profile.'/?locale=en_US&apikey='.$this->apikey;
    }
}