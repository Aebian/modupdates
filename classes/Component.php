<?php namespace Aebian\ModUpdates\Classes;

use Cms\Classes\ComponentBase;
use Aebian\ModUpdates\Classes\GitLab;

/**
 * Component
 * @package Aebian\ModUpdates\Classes
 */
abstract class Component extends ComponentBase
{
    /**
     * Get new GitLab Instance
     * @return \Aebian\ModUpdates\Classes\GitLab
     */
    protected function getGitLab()
    {
        return new GitLab();
    }
}
