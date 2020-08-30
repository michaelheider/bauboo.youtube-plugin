<?php

namespace Bauboo\YouTube\Components;

use Bauboo\YouTube\Models\Settings;
use Cms\Classes\ComponentBase;

class Video extends ComponentBase
{
	/**
     * {@inheritdoc}
     */
	public function componentDetails()
	{
		return [
			'name' => 'Video',
			'description' => 'Embed a video.',
		];
	}

	/**
     * {@inheritdoc}
     */
	public function defineProperties()
	{
		return [
			'videoId' => [
				'title' => 'Video ID',
				'description' => 'The id of the YouTube video. This is the part at the end of the link: https://www.youtube.com/watch?v=dQw4w9WgXcQ',
				'type' => 'string',
				'validationPattern' => '^[A-Za-z0-9_\-]{11}$',
				'validationMessage' => 'Not a valid Youtube video ID.',
				'default' => 'dQw4w9WgXcQ',
			],
			'playerControls' => [
				'title' => 'Player Controls',
				'description' => 'Show player controls.',
				'type' => 'checkbox',
				'default' => true,
			],
			'privacyMode' => [
				'title' => 'Privacy-Enhanced Mode',
				'description' => 'If you activate the privacy-enhanced mode, YouTube will not save information about the users on your website, unless they watch the video.',
				'type' => 'checkbox',
				'default' => true,
			],
		];
	}

	/** YouTube video ID. */
	public string $videoId;
	/** Whether player controls are displayed. */
	public string $playerControls;
	/** Whether privacy mode is activated. */
	public string $privacyMode;
	/** See example data at `getData()` method. */
	public array $data;

	/**
     * {@inheritdoc}
     */
	public function onRun()
	{
		$this->videoId = $this->property('videoId');
		$this->playerControls = $this->property('playerControls');
		$this->privacyMode = $this->property('privacyMode');
		$this->data = $this->getData();
	}

	/**
	 * Fetch data about the YouTube video.
	 *
	 * @example // example data
	 * [
	 *     "publishedAt" => "2009-10-25T06:57:33Z"
	 *     "channelId" => "UC38IQsAvIsxxjztdMZQtwHA"
	 *     "title" => "Rick Astley - Never Gonna Give You Up (Video)"
	 *     "description" => " ... "
	 *     "thumbnails" => [
	 *         "default" => [
	 *             "url" => "https://i.ytimg.com/vi/dQw4w9WgXcQ/default.jpg"
	 *             "width" => 120
	 *             "height" => 90
	 *         ]
	 *         "..." => [ ... ]
	 *     ]
	 *     "channelTitle" => "RickAstleyVEVO"
	 *     "tags" => [ ... ]
	 *     "categoryId" => "10"
	 *     "liveBroadcastContent" => "none"
	 *     "localized" => [
	 *         "title" => "Rick Astley - Never Gonna Give You Up (Video)"
	 *         "description" => " ... "
	 *     ]
	 *     "defaultAudioLanguage" => "en-US"
	 * ]
	 */
	protected function getData(): array
	{
		$apiKey = Settings::get('api_key', '');
		$response = file_get_contents('https://www.googleapis.com/youtube/v3/videos?id='.$this->videoId.'&part=snippet&key='.$apiKey);
		if (false === $response) {
			return false;
		} else {
			$data = json_decode($response, true);

			return $data['items'][0]['snippet'];
		}
	}
}
