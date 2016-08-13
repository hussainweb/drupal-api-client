<?php

namespace Hussainweb\DrupalApi\Entity\Collection;

use Hussainweb\DrupalApi\Entity\User;

class UserCollection extends EntityCollection
{

    public function getListItemClass()
    {
        return User::class;
    }
}
