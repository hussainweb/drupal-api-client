<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Entity\Collection;

use Hussainweb\DrupalApi\Entity\PiftCiJob;

class PiftCiJobCollection extends EntityCollection
{

    public function getListItemClass()
    {
        return PiftCiJob::class;
    }
}
