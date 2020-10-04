<?php

return [
	'plugin' => [
		'name' => 'YouTube',
		'description' => 'Ein YouTube Video einfügen mit zusätzlichen Informationen wie der Videobeschreibung.',
	],
	'settings_item' => [
		'description' => 'Geben Sie Ihren YouTube API Schlüssel an und passen Sie Einstellungen für eingebettete Videos an.',
		'keywords' => 'YouTube Bauboo API key Schlüssel API-key API-Schlüssel',
	],
	'settings' => [
		'hint_text' => 'Einen YouTube API Schlüssel erhalten:',
		'hint_link_text' => 'Informationen',
		'api_key_label' => 'Ihr YouTube API Schlüssel',
		'api_key_comment' => 'Geben Sie Ihren YouTube API Schlüssel ein.',
		'display_error_label' => 'Sollen Fehler angezeigt werden?',
		'display_error_comment' => 'Diese Option bestimmt, ob die standard Komponente Fehler anzeigen soll. Genauer gesagt, bestimmt sie, ob die Eigenschaft `video.error` einen Fehlertext enthält.',
	],
	'permissions' => [
		'label' => 'YouTube Einstellungen bearbeiten.',
	],
	'component' => [
		'name' => 'YouTube Video',
		'description' => 'Ein YouTube Video einfügen mit seiner Videobeschreibung.',
		'videoId' => [
			'title' => 'Video ID',
			'description' => 'Die ID des YouTube videos. Dies ist das Ende des Links: https://www.youtube.com/watch?v=dQw4w9WgXcQ',
			'validationMessage' => 'Ungültige YouTube Video ID.',
		],
		'playerControls' => [
			'title' => 'Player Steuerelemente',
			'description' => 'Player Steuerelemente anzeigen.',
		],
		'privacyMode' => [
			'title' => 'Erweiterten Datenschutzmodus',
			'description' => 'Wenn Sie den erweiterten Datenschutzmodus aktivieren, werden von YouTube keine Informationen über die Besucher auf deiner Website gespeichert, es sei denn, sie sehen sich das Video an.',
		],
		'responsive' => [
			'title' => 'Responsivität',
			'description' => 'Die Videoplayergrösse ist variabel und passt sich der Website an. Falls aktiviert wird die fixe Grösse ignoriert.',
			'options' => [
				'not' => 'fixe Grösse',
				'1by1' => '1 × 1',
				'4by3' => '4 × 3',
				'16by9' => '16 × 9',
				'21by9' => '21 × 9',
			],
		],
		'width' => [
			'title' => 'Breite',
			'description' => 'Video Breite mit gültiger CSS Einheit.',
			'validationMessage' => 'Breite muss eine gültige CSS Einheit haben.',
		],
		'height' => [
			'title' => 'Höhe',
			'description' => 'Video Höhe mit gültiger CSS Einheit.',
			'validationMessage' => 'Höhe muss eine gültige CSS Einheit haben.',
		],
		'no_video_with_id' => 'Kein YouTube Video mit ID: ',
		'markup' => [
			'tags_title' => 'Tags',
			'tags_empty' => 'Keine Tags.',
			'thumbnails_title' => 'Vorschaubilder',
			'thumbnails_empty' => 'Keine Vorschaubilder.',
			'error' => 'Fehler:',
		],
	],
];
