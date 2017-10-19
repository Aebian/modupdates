<?php namespace Aebian\ModUpdates\Classes;

use Aebian\ModUpdates\Classes\Component;
use Aebian\ModUpdates\Classes\GitLab;

/**
 * Pagination Component
 * @package Aebian\ModUpdates\Classes
 */
abstract class PaginationComponent extends Component
{
    /**
     * Return Pagination Property array
     * @return array
     */
    protected function paginationProperties($props)
    {
        return $props + [
            'per_page' => [
                'title' => 'aebian.modupdates::lang.pagination.per_page',
                'type'  => 'string',
                'group' => 'aebian.modupdates::lang.pagination.group'
            ]
        ];
    }
}
