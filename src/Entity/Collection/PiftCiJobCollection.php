<?php

namespace Hussainweb\DrupalApi\Entity\Collection;

use Hussainweb\DrupalApi\Entity\PiftCiJob;

class PiftCiJobCollection extends EntityCollection
{

    public function getListItemClass(): string
    {
        return PiftCiJob::class;
    }
}
