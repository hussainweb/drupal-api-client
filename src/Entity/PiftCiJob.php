<?php

namespace Hussainweb\DrupalApi\Entity;

class PiftCiJob extends Entity
{

    /**
     * {@inheritdoc}
     */
    public function getIdField(): string
    {
        return 'job_id';
    }

    /**
     * {@inheritdoc}
     */
    protected function getIntegerFields(): array
    {
        return ['job_id'];
    }
}
