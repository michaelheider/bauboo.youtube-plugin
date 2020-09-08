# Documentation

## General

The plugin embeds YouTube videos in an `iframe` element. The privacy enhanced mode and the player controls are encoded in the URL of the `iframe`.

Meta data such as title, description, date of publishing etc. are fetched each time the page is accessed before the page is rendered from the YouTube API v3. This requires you to specify an API key in the settings.

## Avaiable Data

All data is avaiable in the video.data.xxx properties. The avaiable data is:

- title
- description
- channelTitle
- publishedAt
- tags: a list of strings
- thumbnails: a list of pictures

## Errors

If an error occurs while fetching the meta data, e.g. an incorrect API key, then the following will happen:

- The video's `iframe` itself will still be displayed.
- If the settings allow it, an error message is shown on the page.
- All meta data strings default to an empty string.
