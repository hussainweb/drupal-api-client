<?php

namespace Hussainweb\DrupalApi\Entity;

class File extends Entity
{

    /**
     * {@inheritdoc}
     */
    public function getIdField(): string
    {
        return 'fid';
    }

    /**
     * {@inheritdoc}
     */
    public function getIntegerFields(): array
    {
        return ['fid'];
    }
}
