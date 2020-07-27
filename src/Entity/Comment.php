<?php

namespace Hussainweb\DrupalApi\Entity;

class Comment extends Entity
{

    /**
     * {@inheritdoc}
     */
    public function getIdField(): string
    {
        return 'cid';
    }

    /**
     * {@inheritdoc}
     */
    protected function getIntegerFields(): array
    {
        return ['cid'];
    }
}
