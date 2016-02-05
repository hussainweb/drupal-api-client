<?php

/**
 * @file
 */

namespace Hussainweb\DrupalApi\Entity;

class TaxonomyTerm extends Entity
{

    /**
     * Map vocabulary id's to names.
     *
     * @var array
     */
    public static $vocabularies = [
        1 => 'Forums',
        2 => 'Screenshots',
        3 => 'Module categories',
        5 => 'Drupal version',
        6 => 'Core compatibility',
        7 => 'Release type',
        9 => 'Issue tags',
        31 => 'Page status',
        34 => 'Front page news',
        38 => 'Audience',
        44 => 'Maintenance status',
        46 => 'Development status',
        48 => 'Services',
        50 => 'Sectors',
        52 => 'Locations',
        54 => 'Keywords',
        56 => 'Level',
        58 => 'License',
        60 => 'Book availability',
        62 => 'Book format',
    ];

    /**
     * {@inheritdoc}
     */
    public function getIdField()
    {
        return 'tid';
    }
}
