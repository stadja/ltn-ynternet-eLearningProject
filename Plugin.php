<?php namespace LTN\ElearningCourses;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        // return [
        //     'Owl\FormWidgets\Tagbox\Widget' => [
        //         'label' => 'Tagbox',
        //         'code'  => 'owl-tagbox',
        //         'path' => 'test'
        //     ],
        // ];
    }

    public function registerSettings()
    {
    }

    public function registerFormWidgets()
    {
        return [
            'Owl\FormWidgets\Tagbox\Widget' => [
                'label' => 'Tagbox',
                'code'  => 'owl-tagbox'
            ],
        ];
    }
}
