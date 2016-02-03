<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Entity;

class Node extends Entity
{

    /**
     * {@inheritdoc}
     */
    public function getIdField()
    {
        return 'nid';
    }
}
