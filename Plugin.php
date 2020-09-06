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
				'label'       => 'bauboo.youtube::lang.plugin.name',
				'description' => 'bauboo.youtube::lang.settings_item.description',
				'icon'        => 'oc-icon-youtube-play',
				'class'       => 'Bauboo\Youtube\Models\Settings',
				'permissions' => ['bauboo.youtube.settings'],
				'keywords'    => 'bauboo.youtube::lang.settings_item.keywords',
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function registerPermissions()
	{
		return [
			'bauboo.youtube.settings' => ['label' => 'bauboo.youtube::lang.permissions.label'],
		];
	}
}
