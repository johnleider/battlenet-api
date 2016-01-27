<?php
namespace johnleider\BattleNet\Requests;

use GuzzleHttp\{Client, Pool, Promise};
use GuzzleHttp\Psr7\Request;
use johnleider\BattleNet\Enums\{Regions, Scopes};
use johnleider\BattleNet\Responses\Response;
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
     * @param $apiKey
     * @param $apiSecret
     * @param $region
     * @param $locale
     */
    public function __construct(
        string $apiKey,
        string $apiSecret,
        string $region = Regions::US,
        string $locale = null
    ) {
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

        $response = count($this->uris) == 1
            ? $this->first()
            : $this->all();

        $this->uris = [];

        return $response;
    }

    /**
     * Return the first uri
     *
     * @return Response
     */
    public function first()
    {
        $response = $this->client->get(
            $this->getBaseUri(array_shift($this->uris))
        )
            ->getBody()
            ->getContents();

        return json_decode($response);
    }

    /**
     * Return all uris as promises
     *
     * @return Response
     */
    public function all() : array
    {
        $response = [];

        $requests = function ($uris) {
            foreach ($uris as $uri) {
                yield new Request('GET',
                    $this->getBaseUri($uri)
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
     * Set the access token
     *
     * @param $accessToken
     */
    public function setAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Response with a JsonP Callback
     *
     * @param $jsonP
     */
    public function setJsonP(string $jsonP)
    {
        $this->jsonP = $jsonP;
    }

    /**
     * Set the region
     *
     * @param $region
     */
    public function setRegion(string $region)
    {
        $this->region = $region;
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
    private function getBaseUri(string $uri = '')
    {
        if (! is_null($query = $this->query)) {
            $query = '?'.http_build_query($this->query);
        }

        return 'https://'.$this->region.'.api.battle.net/'.$uri.$query;
    }
}