<?php

namespace Hussainweb\DrupalApi\Entity;

class User extends Entity
{

    /**
     * {@inheritdoc}
     */
    public function getIdField()
    {
        return 'uid';
    }

    /**
     * {@inheritdoc}
     */
    protected function getIntegerFields()
    {
        return ['uid'];
    }
}
