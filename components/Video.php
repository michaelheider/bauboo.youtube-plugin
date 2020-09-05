<?php

namespace Bauboo\YouTube\Components;

use Bauboo\YouTube\Models\Settings;
use Cms\Classes\ComponentBase;

class Video extends ComponentBase
{
    /**
     * {@inheritdoc}
     */
    public function componentDetails(): array
    {
        return [
            'name' => 'Video',
            'description' => 'Embed a YouTube video.',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function defineProperties(): array
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
                'title' => 'Responsiveness',
                'description' => 'Makes the player size fluid. If enabled, ignore fixed sizing.',
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

    /** @var string YouTube video ID. */
    public $videoId;
    /** @var bool Whether the video is displayed responsive or fixed size. */
    public $isResponsive;
    /** @var string If `$isResponsive` is true, this is the aspect ratio. */
    public $responsiveRatio;
    /** @var string Video width, if not responsive. */
    public $width;
    /** @var string Video height, if not responsive. */
    public $height;
    /** @var bool Whether player controls are displayed. */
    public $playerControls;
    /** @var bool Whether privacy mode is activated. */
    public $privacyMode;
    /** @var array See example data at `getData()` method. */
    public $data;
    /** @var string Holds error information if an error occurs and the settings ask for it. */
    public $error;
    /** @var bool Whether an error has occured. */
    protected $hasError = false;

    /**
     * {@inheritdoc}
     */
    public function onRun(): void
    {
        $this->videoId = $this->property('videoId');
        $this->isResponsive = 'not' !== $this->property('responsive');
        $this->responsiveRatio = $this->property('responsive');
        $this->width = $this->property('width');
        $this->height = $this->property('height');
        $this->playerControls = (bool) $this->property('playerControls');
        $this->privacyMode = (bool) $this->property('privacyMode');
        $data = $this->getData();
        if (!$this->hasError) {
            $data = $this->convert($data);
        }
        $this->data = $data;
    }

    /**
     * Fetch data about the YouTube video.
     * It also sets the `$error` property if an error occurs and the settings allow it.
     *
     * @return array Associative array, see example below.
     *
     * @example // example data, returned as associative array
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
        $url = 'https://www.googleapis.com/youtube/v3/videos?id='.$this->videoId.'&part=snippet&key='.$apiKey;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        $st_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        $data = json_decode($data, true);
        $error = '';
        if (200 == $st_code) {
            if (count($data['items']) > 0) {
                return $data['items'][0]['snippet'];
            } else {
                $error = 'No YouTube video with ID \''.$this->videoId."'.";
            }
        } else {
            $error = $data['error']['message'];
        }
        $this->hasError = true;
        if (Settings::get('display_error', false)) {
            $this->error = $error;
        }

        return [];
    }

    /**
     * Escape all html chars and replace all `\n` with `<br />` in `description`.
     */
    protected function convert(array $data): array
    {
        $data['description'] = htmlspecialchars($data['description']);
        $data['description'] = str_replace("\n", '<br />', $data['description']);

        return $data;
    }
}
