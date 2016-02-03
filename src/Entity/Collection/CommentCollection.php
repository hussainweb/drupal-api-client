<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Entity\Collection;

use Hussainweb\DrupalApi\Entity\Comment;

class CommentCollection
{

    public function getListItemClass()
    {
        return Comment::class;
    }
}
