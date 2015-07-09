<?php

require_once __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;

class Blizzard
{
    protected $apikey = '';
    protected $base_uri = 'api.battle.net';
    protected $client;
    protected $region;

    public function __construct($region)
    {
        $this->region = $region;
        $this->client = new Client([
            'base_uri' => 'https://'.$region.'.'.$this->base_uri,
            'verify'   => false
        ]);
    }

    public function get(array $options)
    {
        $url = $this->buildUrl($options);
        return $this->client->get($url, [
            'query' => [
                'locale' => 'en_US',
                'apikey' => $this->apikey
            ]
        ]);
    }

    public function buildUrl(array $options)
    {
        $profile = str_replace('#', '-', $options['profile']);
        return $this->game.'/'.$profile.'/';
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
        return parent::get($options);
    }
}

$profile = 'zeroskillz#1838';

var_dump((new Diablo('us'))->profile(compact('profile')));