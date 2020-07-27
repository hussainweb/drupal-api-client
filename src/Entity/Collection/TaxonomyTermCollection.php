<?php

namespace Hussainweb\DrupalApi\Entity\Collection;

use Hussainweb\DrupalApi\Entity\TaxonomyTerm;

class TaxonomyTermCollection extends EntityCollection
{

    public function getListItemClass(): string
    {
        return TaxonomyTerm::class;
    }
}
