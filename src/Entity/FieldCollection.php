<?php

namespace Hussainweb\DrupalApi\Entity;

class FieldCollection extends Entity
{

    /**
     * {@inheritdoc}
     */
    public function getIdField()
    {
        return 'item_id';
    }

    /**
     * {@inheritdoc}
     */
    protected function getIntegerFields()
    {
        return ['item_id'];
    }
}
