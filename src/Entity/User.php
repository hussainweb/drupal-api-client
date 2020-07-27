<?php

namespace Hussainweb\DrupalApi\Entity;

class User extends Entity
{

    /**
     * {@inheritdoc}
     */
    public function getIdField(): string
    {
        return 'uid';
    }

    /**
     * {@inheritdoc}
     */
    protected function getIntegerFields(): array
    {
        return ['uid'];
    }
}
