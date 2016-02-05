<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Entity;

use Psr\Http\Message\ResponseInterface;

abstract class Entity
{

    /**
     * @var mixed
     */
    protected $rawData;

    public function __construct($raw_data)
    {
        $this->rawData = $raw_data;
    }

    /**
     * Get the response entity data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->rawData;
    }

    /**
     * Get the specified property from the data.
     *
     * @param $name
     *   Property name
     *
     * @return mixed
     *   Value for the property name.
     */
    public function __get($name)
    {
        return isset($this->rawData->$name) ? $this->rawData->$name : null;
    }

    /**
     * Set the value to a specified property.
     * @param $name
     *   Property name
     * @param $value
     *   Value
     */
    public function __set($name, $value)
    {
        $this->rawData->$name = $value;
    }

    /**
     * Retrieve the name of the field which holds the id of the entity.
     *
     * @return string
     *   The name of the field which holds the id of the entity.
     */
    abstract public function getIdField();

    /**
     * Get the Id of the entity.
     *
     * @return mixed
     */
    public function getId()
    {
        $id_field = $this->getIdField();
        return $this->rawData->$id_field;
    }

    /**
     * Construct the object from a HTTP Response.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     *   Response object to parse.
     *
     * @return static
     *   The EntityCollection object for the response.
     */
    public static function fromResponse(ResponseInterface $response)
    {
        return new static(json_decode((string) $response->getBody()));
    }
}
