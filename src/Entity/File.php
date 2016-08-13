<?php

namespace Hussainweb\DrupalApi\Entity;

class File extends Entity
{

    /**
     * {@inheritdoc}
     */
    public function getIdField()
    {
        return 'fid';
    }

    /**
     * {@inheritdoc}
     */
    public function getIntegerFields()
    {
        return ['fid'];
    }
}
