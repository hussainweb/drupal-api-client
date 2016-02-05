<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Entity;

class FieldCollection extends Entity
{

    /**
     * {@inheritdoc}
     */
    public function getIdField()
    {
        return 'item_id';
    }
}
