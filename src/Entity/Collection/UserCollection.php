<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Entity\Collection;

use Hussainweb\DrupalApi\Entity\User;

class UserCollection
{

    public function getListItemClass()
    {
        return User::class;
    }
}
