<?php

namespace Hussainweb\DrupalApi\Entity;

class FieldCollection extends Entity
{
    /**
     * {@inheritdoc}
     */
    public function getIdField(): string
    {
        return 'item_id';
    }

    /**
     * {@inheritdoc}
     */
    protected function getIntegerFields(): array
    {
        return ['item_id'];
    }
}
