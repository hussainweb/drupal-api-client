<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Entity\Collection;

use Hussainweb\DrupalApi\Entity\Node;

class NodeCollection extends EntityCollection
{

    public function getListItemClass()
    {
        return Node::class;
    }
}
