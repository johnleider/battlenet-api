<?php
namespace johnleider\BattleNet;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

abstract class BattleNet
{
    /**
     * Battlnet API Key
     * @var
     */
    private $apiKey;

    /**
     * Battlenet API Secret
     *
     * @var
     */
    private $apiSecret;

    /**
     * The clients access token
     *
     * @var
     */
    private $accessToken;

    /**
     * Instance of Guzzle
     *
     * @var Client
     */
    private $client;

    /**
     * The locale of the response
     *
     * @var null
     */
    protected $locale;

    /**
     * Designate a JSON P Callback
     *
     * @var
     */
    protected $jsonP;

    /**
     * The region that is being queried
     *
     * @var string
     */
    protected $region;

    /**
     * The designated url for the query
     *
     * @var
     */
    protected $url;

    /**
     * Set class variables
     *
     * @param $apiKey
     * @param $apiSecret
     * @param string $region
     * @param $locale
     */
    public function __construct($apiKey, $apiSecret, $region = 'us', $locale = null)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;

        $this->locale = $locale;
        $this->region = $region;
        $this->client = new Client();
    }

    /**
     * Get authorization
     *
     * @param $redirect
     * @return \Psr\Http\Message\StreamInterface
     */
    public function authorize($redirect)
    {
        $query = http_build_query([
            'client_id' => $this->apiKey,
            'scope' => 'wow.profile+sc2.profile',
            'state' => mt_rand(1, 9999),
            'redirect_uri' => $redirect,
            'response_type' => 'code'
        ]);

        header('Location: https://'.$this->region.'.battle.net/oauth/authorize?'.$query);
        die;
    }

    /**
     * Get auth token
     *
     * @param $redirect
     * @param $code
     * @return \Psr\Http\Message\StreamInterface
     */
    public function token($redirect, $code)
    {
        $response = $this->client->post(
            'https://'.$this->region.'.battle.net/oauth/token',
            [
                'form_params' => [
                    'redirect_uri' => $redirect,
                    'scope' => 'wow.profile+sc2.profile',
                    'grant_type' => 'authorization_code',
                    'code' => $code
                ],
                'auth'  => [$this->apiKey, $this->apiSecret]
            ]
        );

        return $response->getBody();
    }

    /**
     * Instantiate Guzzle and return results as json
     *
     * @param array $options
     * @return \Psr\Http\Message\StreamInterface
     */
    public function get($options = [])
    {
        $query['apikey'] = $this->apiKey;

        if ( ! is_null($this->accessToken)) {
            $query['access_token'] = $this->accessToken;
        }

        if ( ! empty($options)) {
            $query['fields'] = join(',', $options);
        }

        if ($this->locale) {
            $query['locale'] = $this->locale;
        }

        if ($this->jsonP) {
            $query['callback'] = $this->jsonP;
        }

        $query = array_merge($query, $options);

        $response = $this->client->get(
            'https://'.$this->region.'.api.battle.net/'.$this->url,
            [
                'query' => $query
            ]
        );

        return $response->getBody();
    }

    /**
     * Set the access token
     *
     * @param $response
     */
    public function setAccessToken($response)
    {
        $auth = json_decode($response);

        $this->accessToken = $auth->access_token;
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