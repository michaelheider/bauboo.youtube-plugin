<?php

return [
	'plugin' => [
		'name' => 'YouTube',
		'description' => 'Embed a YouTube video with additional data such as its description.',
	],
	'settings_item' => [
		'description' => 'Set your YouTube API key and manage settings for embedded videos.',
		'keywords' => 'YouTube Bauboo API key API-key',
	],
	'settings' => [
		'hint_text' => 'Get an API key:',
		'hint_link_text' => 'How to',
		'api_key_label' => 'Your YouTube API Key',
		'api_key_comment' => 'Enter your YouTube API Key.',
		'display_error_label' => 'Display errors?',
		'display_error_comment' => 'The `video.error` variable contains the error message if there is an error. If disabled, the variable remains empty. It is recommended to only use this for testing purposes. Example: If enabled, the default component displays errors, else they are not shown.',
		'is_bootstrap_5' => 'Bootstrap Version',
		'is_bootstrap_5_comment' => 'Choose true if you use Bootstrap 5.x. Choose false if you use Bootstrap 4.x.',
	],
	'permissions' => [
		'label' => 'Manage YouTube settings.',
	],
	'component' => [
		'name' => 'YouTube Video',
		'description' => 'Embed a YouTube video plus its description.',
		'videoId' => [
			'title' => 'Video ID',
			'description' => 'The ID of the YouTube video. This is the part at the end of the link: https://www.youtube.com/watch?v=dQw4w9WgXcQ',
			'validationMessage' => 'Not a valid YouTube video ID.',
		],
		'playerControls' => [
			'title' => 'Player Controls',
			'description' => 'Show player controls.',
		],
		'privacyMode' => [
			'title' => 'Privacy-Enhanced Mode',
			'description' => 'If you activate the privacy-enhanced mode, YouTube will not save information about the users on your website, unless they watch the video.',
		],
		'responsive' => [
			'title' => 'Responsiveness',
			'description' => 'Makes the player size fluid. If enabled, ignore fixed sizing.',
			'options' => [
				'not' => 'fixed',
				'1x1' => '1 × 1',
				'4x3' => '4 × 3',
				'16x9' => '16 × 9',
				'21x9' => '21 × 9',
			],
		],
		'width' => [
			'title' => 'Width',
			'description' => 'Widget width with valid CSS unit.',
			'validationMessage' => 'Width must use a valid CSS unit.',
		],
		'height' => [
			'title' => 'Height',
			'description' => 'Widget height with valid CSS unit.',
			'validationMessage' => 'Width must use a valid CSS unit.',
		],
		'no_video_with_id' => 'No YouTube video with ID: ',
		'markup' => [
			'tags_title' => 'Tags',
			'tags_empty' => 'No tags.',
			'thumbnails_title' => 'Thumbnails',
			'thumbnails_empty' => 'No thumbnails.',
			'error' => 'Error:',
		],
	],
];
