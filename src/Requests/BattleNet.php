<?php

namespace johnleider\BattleNet\Requests;

use GuzzleHttp\{Client, Pool, Promise};
use GuzzleHttp\Psr7\Request;
use johnleider\BattleNet\Enums\Scopes;
use Psr\Http\Message\StreamInterface;
use stdClass;

abstract class BattleNet
{
    /**
     * Battlenet API Key
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
    private $locale = null;

    /**
     * Designate a JSON P Callback
     *
     * @var
     */
    private $jsonP;

    /**
     * The locale of the response
     *
     * @var
     */
    private $region;

    /**
     * The designated uri for the query
     *
     * @var
     */
    protected $uris = [];

    /**
     * The current query params
     *
     * @var array
     */
    protected $query = [];

    /**
     * Set class variables
     *
     * @param string $apiKey
     * @param string $apiSecret
     * @param string $apiToken
     */
    public function __construct(
        string $apiKey,
        string $apiSecret,
        string $apiToken = null
    ) {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->apiToken = $apiToken;
        $this->client = new Client();
    }

    /**
     * Get authorization from Battlenet
     *
     * @param $redirect
     * @param $scopes
     * @return StreamInterface
     */
    public function authorize(string $redirect, array $scopes = [])
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
     * @return StreamInterface
     */
    public function token(string $redirect, string $code) : StreamInterface
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
     * @return array|stdClass
     */
    public function get(array $options = [])
    {
        $this->buildQuery($options);

        $response = count($this->uris) == 1
            ? $this->first()
            : $this->all();

        $this->uris = [];

        return $response;
    }

    /**
     *  Build up the query for the API call
     *
     *  @param array $options
     *  @return array
     */
    public function buildQuery(array $options)
    {
        $query['apikey'] = $this->apiKey;

        if (! is_null($this->apiToken)) {
            $query['access_token'] = $this->apiToken;
        }

        if (! is_null($this->jsonP)) {
            $query['callback'] = $this->jsonP;
        }

        $this->query = array_merge($query, $options);
    }

    /**
     * Return the first uri
     *
     * @return Response
     */
    public function first()
    {
        $response = $this->client->get(
            $this->getRequestUri(array_shift($this->uris))
        )
            ->getBody()
            ->getContents();

        return json_decode($response);
    }

    /**
     * Return all uris as promises
     *
     * @return array
     */
    public function all() : array
    {
        $response = [];

        $requests = function ($uris) {
            foreach ($uris as $uri) {
                yield new Request('GET',
                    $this->getRequestUri($uri)
                );
            }
        };

        $pool = new Pool($this->client, $requests($this->uris), [
            'fulfilled' => function ($data) use (&$response) {
                $data = json_decode($data->getBody()->getContents());

                $response[] = $data;
            },
        ]);

        $promise = $pool->promise();
        $promise->wait();

        return $response;
    }

    /**
     * Response with a JsonP Callback
     *
     * @param $jsonP
     */
    public function setJsonP(string $jsonP)
    {
        $this->jsonP = $jsonP;

        return $this;
    }

    /**
     * Set locale for request
     *
     * @param string $locale
     */
    public function setLocale(string $locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Set region for request
     *
     * @param string $region
     */
    public function setRegion(string $region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Add to request pool
     *
     * @param string $uri
     */
    protected function addToRequest(string $uri)
    {
        $region = $this->region;
        $locale = $this->locale;

        $this->uris[] = compact('region', 'uri', 'locale');
    }

    /**
     * Generate scopes for authorization
     * @param array $scopes
     * @return string
     */
    private function generateScopes(array $scopes = [])
    {
        if (empty($scopes)) {
            $scopes = [
                Scopes::WOW,
                Scopes::SC2
            ];
        }

        return $this->scopes = join('+', $scopes);
    }

    /**
     * Return base uri
     *
     * @param $uri
     * @return string
     */
    private function getRequestUri(array $uri)
    {
        $query = '?'.http_build_query($this->query);

        if (! is_null($uri['locale'])) {
            $query .= "&locale={$uri['locale']}";
        }

        return "https://{$uri['region']}.api.battle.net/{$uri['uri']}{$query}";
    }
}