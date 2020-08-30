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
            'description' => 'Embed a YouTube video.',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function defineProperties()
    {
        $css_units = '%|em|ex|ch|rem|cm|mm|q|in|pt|pc|px|vw|vh|vmin|vmax';

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
            'responsive' => [
                'title' => 'krisawzm.embed::common.properties.responsive.title',
                'description' => 'krisawzm.embed::common.properties.responsive.description',
                'default' => '16by9',
                'type' => 'dropdown',
                'options' => [
                    'not' => 'fixed',
                    '1by1' => '1 by 1',
                    '4by3' => '4 by 3',
                    '16by9' => '16 by 9',
                    '21by9' => '21 by 9',
                ],
            ],
            'width' => [
                'title' => 'Width',
                'description' => 'Widget width with valid CSS unit.',
                'default' => '560',
                'type' => 'string',
                'validationPattern' => '^(auto|0)$|^\d+(\.\d+)?('.$css_units.')?$',
                'validationMessage' => 'Width must use a valid CSS unit.',
            ],
            'height' => [
                'title' => 'Height',
                'description' => 'Widget height with valid CSS unit.',
                'default' => '315',
                'type' => 'string',
                'validationPattern' => '^(auto|0)$|^\d+(\.\d+)?('.$css_units.')?$',
                'validationMessage' => 'Height must use a valid CSS unit.',
            ],
        ];
    }

    /** YouTube video ID. */
    public string $videoId;
    /** Whether the video is displayed responsive or fixed size. */
    public bool $isResponsive;
    /** If `$isResponsive` is true, this is the aspect ratio. */
    public string $responsiveRatio;
    /** Video width, if not responsive. */
    public string $width;
    /** Video height, if not responsive. */
    public string $height;
    /** Whether player controls are displayed. */
    public bool $playerControls;
    /** Whether privacy mode is activated. */
    public bool $privacyMode;
    /** See example data at `getData()` method. */
    public array $data;

    /**
     * {@inheritdoc}
     */
    public function onRun()
    {
        $this->videoId = $this->property('videoId');
        $this->isResponsive = 'not' !== $this->property('responsive');
        $this->responsiveRatio = $this->property('responsive');
        $this->width = $this->property('width');
        $this->height = $this->property('height');
        $this->playerControls = (bool) $this->property('playerControls');
        $this->privacyMode = (bool) $this->property('privacyMode');
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
