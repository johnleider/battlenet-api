<?php

namespace johnleider\BattleNet;

use GuzzleHttp\Client;

abstract class BattleNet
{
    protected $client;
    protected $locale;
    protected $apikey;

    /**
     * Instantiate Guzzle
     *
     * @param $apikey
     * @param $region
     * @param $locale
     */
    public function __construct($apikey, $region, $locale)
    {
        $this->apikey = $apikey;
        $this->locale = $locale;
        $this->region = $region;
    }

    public function get($url)
    {
        $query['apikey'] = $this->apikey;
        $query['locale'] = $this->locale;

        $client = new Client([
            'base_uri' => 'https://'.$this->region.'.api.battle.net',
            'verify'   => false
        ]);

        return $client->get($url,['query' => $query]);
    }
}