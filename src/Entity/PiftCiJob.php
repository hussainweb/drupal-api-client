<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Entity;

class PiftCiJob extends Entity
{

    /**
     * {@inheritdoc}
     */
    public function getIdField()
    {
        return 'job_id';
    }

    /**
     * {@inheritdoc}
     */
    protected function getIntegerFields()
    {
        return ['job_id'];
    }
}
