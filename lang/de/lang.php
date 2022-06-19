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
		'display_error_label' => 'Fehler anzeigen?',
		'display_error_comment' => 'Die Variable `video.error` enthält die Fehlermeldung im Falle eines Fehlers. Wenn deaktiviert, bleibt die Variable leer. Es ist empfohlen, dies nur zu Testzwecken zu aktivieren. Beispiel: Wenn aktiviert, zeigt die Standard Komponente Fehler an, ansonsten nicht.',
		'is_bootstrap_5' => 'Bootstrap Version',
		'is_bootstrap_5_comment' => 'Aktivieren, falls Sie Bootstrap 5.x verwenden. Deaktivieren, falls Sie Bootstrap 4.x verwenden.',
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
				'1x1' => '1 × 1',
				'4x3' => '4 × 3',
				'16x9' => '16 × 9',
				'21x9' => '21 × 9',
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
