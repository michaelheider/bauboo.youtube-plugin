# Documentation

## General

The plugin embeds YouTube videos in an `iframe` element. The privacy enhanced mode and the player controls are encoded in the URL of the `iframe`.

Meta data such as title, description, date of publishing etc. are fetched each time the page is accessed before the page is rendered from the YouTube API v3. This requires you to specify an API key in the settings.

## Avaiable Data

All meta data is avaiable in the video.data.xxx properties. The avaiable meta data (i.e. all data except the URL) is:

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

## YouTube API Key Remarks

Getting an API key is free, however it you get only 100'000 points a day, and one request costs 1 point. So since we are not caching, it costs one point per video per website access. However, 100'000 points should be sufficient for most users.

If you restrict your API key to specific URLs, make sure your `app.url` setting is correct and your website's URL is whitelisted in the API restrictions. The plugin will set the `app.url`'s value as the `referer` header, which Google uses.

## Languages

- English
- German
- Slovene, Thanks [Haedaki](https://github.com/Haedaki)!

## TODO

Feel free to help with translations

### Out Of Scope for Me

- cache video meta data
