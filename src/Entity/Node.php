<?php

namespace Hussainweb\DrupalApi\Entity;

class Node extends Entity
{
    public static $types = [
        'book',
        'book_listing',
        'casestudy',
        'changenotice',
        'forum',
        'organization',
        'packaging_whitelist',
        'page',
        'project_issue',
        'project_core',
        'project_distribution',
        'project_drupalorg',
        'project_module',
        'project_release',
        'project_theme',
        'project_theme_engine',
        'image',
        'project_translation',
        'story',
    ];

    /**
     * {@inheritdoc}
     */
    public function getIdField(): string
    {
        return 'nid';
    }

    /**
     * {@inheritdoc}
     */
    protected function getIntegerFields(): array
    {
        return ['nid', 'vid'];
    }
}
