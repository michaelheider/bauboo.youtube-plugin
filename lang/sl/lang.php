<?php

return [
	'plugin' => [
		'name' => 'YouTube',
		'description' => 'Vstavi YouTube video z dodatnimi informacijami, kot je na primer opis.',
	],
	'settings_item' => [
		'description' => 'Vnesi svoj YouTube API ključ in upravljaj z nastavitvami za vdelane videoposnetke.',
		'keywords' => 'YouTube Bauboo API key API-key',
	],
	'settings' => [
		'hint_text' => 'Pridobi API ključ:',
		'hint_link_text' => 'Kako pridobim ključ',
		'api_key_label' => 'Tvoj YouTube API ključ',
		'api_key_comment' => 'Vnesi tvoj YouTube API Ključ.',
		'display_error_label' => 'Prikaži napake?',
		'display_error_comment' => 'Spremenljivka `video.error` vsebuje sporočilo o napaki, če je prišlo do napake. Če je onemogočena, je spremenljivka prazna. Priporočljivo je, da jo uporabljate le za testne namene. Primer: Če je omogočeno, privzeta komponenta prikaže napake, sicer se ne prikažejo.',  // DeepL
		'is_bootstrap_5' => 'Različica Bootstrap', // DeepL
		'is_bootstrap_5_comment' => 'Izberite true, če uporabljate Bootstrap 5.x. Izberite false, če uporabljate Bootstrap 4.x. OPOZORILO: OctoberCMS 3 uporablja Bootstrap 5.', // DeepL
	],
	'permissions' => [
		'label' => 'Upravljaj z YouTube nastavitvami.',
	],
	'component' => [
		'name' => 'YouTube Video',
		'description' => 'Vdelaj YouTube video.',
		'videoId' => [
			'title' => 'Video ID',
			'description' => 'To je ID YouTube videa. Prikazan je na koncu povezave do videa: https://www.youtube.com/watch?v=dQw4w9WgXcQ',
			'validationMessage' => 'Video ID ni veljaven.',
		],
		'playerControls' => [
			'title' => 'Nadzor predvajalnika',
			'description' => 'Prikaži gumbe predvajalnika',
		],
		'privacyMode' => [
			'title' => 'Višja stopna zasebnosti',
			'description' => 'Če aktiviraš to nastavitev, YouTube ne bo shranjeval podatkov o uporabnikih na tvoji spletni strani, razen, če si ogledajo video.',
		],
		'responsive' => [
			'title' => 'Prilagodljivost širine',
			'description' => 'Omogoči, da se velikost predvajalnika spreminja glede na velikost zaslona. Če je omogočeno, se vrednost dimenzij vnešena v nastavitvah ne upošteva.',
			'options' => [
				'not' => 'določena velikost',
				'1x1' => '1 : 1',
				'4x3' => '4 : 3',
				'16x9' => '16 : 9',
				'21x9' => '21 : 9',
			],
		],
		'width' => [
			'title' => 'Širina',
			'description' => 'Širina z vrednostjo ene od CSS enot.',
			'validationMessage' => 'Širina mora imeti veljavno CSS enoto.',
		],
		'height' => [
			'title' => 'Višina',
			'description' => 'Višina z vrednostjo ene od CSS enot.',
			'validationMessage' => 'Višina mora imeti veljavno CSS enoto.',
		],
		'no_video_with_id' => 'YouTube Video ID manjka: ',
		'markup' => [
			'tags_title' => 'Oznake',
			'tags_empty' => 'Ni oznak.',
			'thumbnails_title' => 'Sličice',
			'thumbnails_empty' => 'Ni sličic.',
			'error' => 'Napaka:',
		],
	],
];
