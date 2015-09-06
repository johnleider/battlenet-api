<?php
namespace johnleider\BattleNet\Responses;

use JsonSerializable;

class Response implements JsonSerializable
{
    /**
     * Construct the class
     * @param array $array
     */
	public function __construct($array = array())
	{
		foreach (json_decode($array) as $key => $value) {
            $this->$key = $value;
        }
	}

    /**
     * Cast object as json string
     * @return string
     */
    function __toString()
    {
        return json_encode(get_object_vars($this));
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}