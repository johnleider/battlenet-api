<?php

namespace johnleider\BattleNet\Responses;

use JsonSerializable;

class Response implements JsonSerializable
{
    /**
     * Response object
     *
     * @var
     */
    private $response;

    /**
     * Construct the class
     *
     * @param $response
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * Cast object as json string
     * @return string
     */
    public function __toString()
    {
        return $this->jsonSerialize();
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return json_decode($this->response);
    }
}