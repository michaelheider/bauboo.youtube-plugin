# YouTube Plugin

A simple plugin for October CMS to embed YouTube videos and meta data into your page.

## Specifying the YouTube API Key

You need a YouTube API key. It is possible to embed videos without one, but in order to fetch the description and other meta data, an API key is required. Get one [here](https://developers.google.com/youtube/v3/getting-started#before-you-start).

## Embedding a Video

Simply add the video component onto your page. In the commponent's settings, specify the YouTube video ID. It can be found at the end of the link to a YouTube video. So for example for this video 'https://www.youtube.com/watch?v=dQw4w9WgXcQ' the ID is 'dQw4w9WgXcQ'.

The component also has more options:

- Player Controls: Wether control elements for the video are displayed.
- Privacy Enhanced Mode: If you activate the privacy-enhanced mode, YouTube will not save information about the users on your website, unless they watch the video.
- Responsiveness: Wether the video should be fixed size specified by width and height, or responsive.
- Width & Height: The width and height of the video if it is not responsive. Otherwise they have no effect.

## Backend Settigns

API key: The API key needs to be a valid YouTube API key.

Should errors be dispalyed?: The default markup includes a descriptive error message if one occurs. This can be disabled here.

## Embed Video Without Additional Data

If you want to embed just the video, but without additional data, you can fork the component and remove everything except for the `iframe`s. The plugin however still expects the API key, even though embedding videos is possible without.

If you don't want to specify the API key, you can copy and paste the `iframe` manually. See [this](https://support.google.com/youtube/answer/171780). Notice, that you can also specify privacy enhanced mode and wether you want video controls to be displayed.
