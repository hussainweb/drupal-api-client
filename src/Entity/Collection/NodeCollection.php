<?php

namespace Hussainweb\DrupalApi\Entity\Collection;

use Hussainweb\DrupalApi\Entity\Node;

class NodeCollection extends EntityCollection
{

    public function getListItemClass(): string
    {
        return Node::class;
    }
}
