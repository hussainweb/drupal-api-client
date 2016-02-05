<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Entity\Collection;

use Hussainweb\DrupalApi\Entity\Comment;

class CommentCollection extends EntityCollection
{

    public function getListItemClass()
    {
        return Comment::class;
    }
}
