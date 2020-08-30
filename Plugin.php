<?php

namespace Bauboo\YouTube;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    /**
     * {@inheritdoc}
     */
    public function registerComponents()
    {
        return [
            'Bauboo\Youtube\Components\Video' => 'video',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function registerSettings()
    {
        return [
            'general' => [
                'label'       => 'YouTube',
                'description' => 'Set your YouTube API key.',
                'icon'        => 'oc-icon-youtube-play',
                'class'       => 'Bauboo\Youtube\Models\Settings',
                'permissions' => ['bauboo.youtube.settings'],
                'keywords'    => 'YouTube Bauboo API key API-key',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function registerPermissions()
    {
        return [
            'bauboo.youtube.settings' => ['label' => 'Manage YouTube settings.'],
        ];
    }
}
