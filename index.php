<?php

require_once __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;

class Blizzard
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

    public function fetch(array $options)
    {
        $response = $this->client->get('');

        return $response->getBody();
    }

    public function buildUrl(array $options)
    {
        $profile = str_replace('#', '-', $options['profile']);
        return $this->game.'/profile/'.$profile.'/?locale=en_US&apikey='.$this->apikey;
    }
}

class Diablo extends Blizzard
{
    protected $game = 'd3';

    public function __construct($region)
    {
        parent::__construct($region);
    }

    public function profile(array $options)
    {
        return $this->fetch($options);
    }
}

$profile = 'zeroskillz#1838';

$diablo = new Diablo('us');
echo $diablo->profile(compact('profile'));