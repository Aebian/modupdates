<?php namespace Aebian\ModUpdates;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'aebian.modupdates::lang.plugin.name',
            'description' => 'aebian.modupdates::lang.plugin.description',
            'author'      => 'Aebian',
            'icon'        => 'icon-GitLab',
            'homepage'    => 'https://Aebian.org'
        ];
    }

    /**
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Aebian\ModUpdates\Components\IssueList' => 'issuelist',
        ];
    }

    /**
     * Register new Twig variables
     * @return array
     */
    public function registerMarkupTags()
    {
        // Check the translate plugin is installed
        if (class_exists('RainLab\Translate\Behaviors\TranslatableModel')) {
            return ['filters' => [
                'cast_to_array' => [$this, 'castToArray']
            ]];
        }

        return [
            'filters' => [
                '_'             => ['Lang', 'get'],
                '__'            => ['Lang', 'choice'],
                'cast_to_array' => [$this, 'castToArray']
            ]
        ];
    }

    
    /**
     * Markup Tag to cast an object to an array
     * @param mixed $stdClassObject
     * @return array
     */
    public function castToArray($stdClassObject)
    {
        return (array)$stdClassObject;
    }
}
