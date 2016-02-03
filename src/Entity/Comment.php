<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Entity;

class Comment extends Entity
{

    /**
     * {@inheritdoc}
     */
    public function getIdField()
    {
        return 'cid';
    }
}
