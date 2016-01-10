<?php
namespace johnleider\BattleNet\Requests;

use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use johnleider\BattleNet\Enums\Regions;
use johnleider\BattleNet\Enums\Scopes;

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
     * Scopes for authorization
     * @var
     */
    private $scopes;

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
    protected $url = [];

    protected $query = [];

    /**
     * Set class variables
     *
     * @param $apiKey
     * @param $apiSecret
     * @param string $region
     * @param $locale
     */
    public function __construct($apiKey, $apiSecret, $region = Regions::US, $locale = null)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->locale = $locale;
        $this->region = $region;
        $this->client = new Client();
    }

    /**
     * Get authorization from Battlenet
     *
     * @param $redirect
     * @param $scopes
     * @return \Psr\Http\Message\StreamInterface
     */
    public function authorize($redirect, array $scopes = array())
    {
        $query = http_build_query([
            'client_id' => $this->apiKey,
            'scope' => $this->generateScopes($scopes),
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
                    'scope' => $this->scopes,
                    'grant_type' => 'authorization_code',
                    'code' => $code
                ],
                'auth'  => [
                    $this->apiKey,
                    $this->apiSecret
                ]
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

        if (! is_null($this->accessToken)) {
            $query['access_token'] = $this->accessToken;
        }

        if (! is_null($this->locale)) {
            $query['locale'] = $this->locale;
        }

        if (! is_null($this->jsonP)) {
            $query['callback'] = $this->jsonP;
        }

        $this->query = array_merge($query, $options);

        $response = count($this->url == 1)
            ? $this->first()
            : $this->all();

        return $response->getBody();
    }

    public function first()
    {
        return $this->client->get(
            'https://'.$this->region.'.api.battle.net/'.$this->url[0],
            [
                'query' => $this->query
            ]
        );
    }

    /**
     * @return \GuzzleHttp\Promise\Promise|\GuzzleHttp\Promise\PromiseInterface
     */
    public function all()
    {
        $requests = function() {
            foreach ($this->url as $url) {
                yield new Request('GET', $url,[
                    'query' => $this->query
                ]);
            }
        };

        $pool = new Pool($this->client, $requests(100), [
            'concurrency' => 5,
            'fulfilled' => function ($response, $index) {
                return $response;
            },
            'rejected' => function ($reason, $index) {
                // this is delivered each failed request
            },
        ]);

        $promise = $pool->promise();
        $promise->wait();

        return $promise;
    }

    /**
     * Set the access token
     *
     * @param $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Response with a JsonP Callback
     *
     * @param $jsonP
     */
    public function setJsonP($jsonP)
    {
        $this->jsonP = $jsonP;
    }

    /**
     * Set the region
     *
     * @param $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * Generate scopes for authorization
     * @param array $scopes
     * @return string
     */
    private function generateScopes(array $scopes = array())
    {
        if (empty($scopes)) {
            $scopes = [
                Scopes::WOW,
                Scopes::SC2
            ];
        }

        return $this->scopes = join('+', $scopes);
    }
}