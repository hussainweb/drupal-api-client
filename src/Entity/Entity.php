<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Entity;

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
}
