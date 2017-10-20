<?php namespace Aebian\ModUpdates\Components;

use Aebian\ModUpdates\Classes\PaginationComponent;

/**
 * Item Component
 * @package Aebian\ModUpdates\Components
 */
class IssueList extends PaginationComponent
{
    /**
     * @var stdObj[]
     */
    public $theList;

    /**
     * @return array
     */
    public function componentDetails()
    {
        return [
            'name'        => 'aebian.modupdates::lang.list.name',
            'description' => 'aebian.modupdates::lang.list.description'
        ];
    }

    /**
     * @return array
     */
    public function defineProperties()
    {
        return $this->paginationProperties([
            'tracker'      => [
                'title'       => 'aebian.modupdates::lang.list.tracker_title',
                'description' => 'aebian.modupdates::lang.list.tracker_desc'
            ],
            
            'labels'      => [
                'title'       => 'aebian.modupdates::lang.list.label_title',
                'description' => 'aebian.modupdates::lang.list.label_desc'
            ],

            'state'      => [
                'title'       => 'aebian.modupdates::lang.list.state_title',
                'description' => 'aebian.modupdates::lang.list.state_desc',
                'type'        => 'dropdown',
                'options'     => [
                    'all'    => 'aebian.modupdates::lang.list.state_opt_all',
                    'opened'  => 'aebian.modupdates::lang.list.state_opt_open',
                    'closed' => 'aebian.modupdates::lang.list.state_opt_closed'
                ]
            ],
            
            'accesstoken'      => [
                'title'       => 'aebian.modupdates::lang.list.accesstoken_title',
                'description' => 'aebian.modupdates::lang.list.accesstoken_desc'
            ], 
        ]);
    }

    /**
     * Prepare vars
     */
    public function onRun()
    {
        $this->theList = $this->getGitLab()->issues(
            $this->property('tracker'), $this->property('labels'), $this->property('state'), $this->property('accesstoken'), $this->property('per_page')
        );  
    }
}
