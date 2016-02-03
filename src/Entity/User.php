<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Entity;

class User extends Entity
{

    /**
     * {@inheritdoc}
     */
    public function getIdField()
    {
        return 'uid';
    }
}
