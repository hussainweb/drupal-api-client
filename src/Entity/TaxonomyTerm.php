<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Entity;

class TaxonomyTerm extends Entity
{

    /**
     * {@inheritdoc}
     */
    public function getIdField()
    {
        return 'tid';
    }
}
