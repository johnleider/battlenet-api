<?php

namespace johnleider\BattleNet;

use GuzzleHttp\Client;

abstract class BattleNet
{
    protected $apikey;
    protected $locale;
    protected $jsonP;
    protected $region;

    /**
     * Set class variables
     *
     * @param $apikey
     * @param $region
     * @param $locale
     */
    public function __construct($apikey, $region = 'us', $locale = null)
    {
        $this->apikey = $apikey;
        $this->locale = $locale;
        $this->region = $region;
    }

    /**
     * Instantiate Guzzle and return results as json
     *
     * @param $url
     * @param array $options
     * @return \Psr\Http\Message\StreamInterface
     */
    public function get($url, $options = [])
    {

        $query['apikey'] = $this->apikey;

        if ( ! empty($options))
        {
            $query['fields'] = join(',', $options);
        }

        if ($this->locale)
        {
            $query['locale'] = $this->locale;
        }

        if ($this->jsonP)
        {
            $query['callback'] = $this->jsonP;
        }

        $client = new Client([
            'base_uri' => 'https://'.$this->region.'.api.battle.net',
            'verify'   => false
        ]);

        return $client->get($url,['query' => $query])->getBody();
    }

    /**
     * Response with a JsonP Callback
     *
     * @param $callback
     */
    public function setJsonP($callback)
    {
        $this->jsonP = $callback;
    }
}