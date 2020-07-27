<?php

namespace Hussainweb\DrupalApi\Entity\Collection;

use Hussainweb\DrupalApi\Entity\Comment;

class CommentCollection extends EntityCollection
{

    public function getListItemClass(): string
    {
        return Comment::class;
    }
}
