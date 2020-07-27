<?php

namespace Hussainweb\DrupalApi\Entity\Collection;

use Hussainweb\DrupalApi\Entity\User;

class UserCollection extends EntityCollection
{

    public function getListItemClass(): string
    {
        return User::class;
    }
}
