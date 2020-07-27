<?php

namespace Hussainweb\DrupalApi\Entity\Collection;

use Hussainweb\DrupalApi\Entity\Comment;

class CommentCollection extends EntityCollection
{

    /**
     * {@inheritdoc}
     */
    public function getListItemClass(): string
    {
        return Comment::class;
    }
}
