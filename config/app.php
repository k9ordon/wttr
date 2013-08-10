<?

$config['base'] = 'http://'.$_SERVER['SERVER_NAME'] . '';
$config['contentBase'] = $config['base'];

$config['weekdays'] = array(
	'Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samastag'
	);
$config['weekdaysShort'] = array(
	'So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'
	);

$config['weatherTypes'] = array(
	//'clear' => array('name' => 'Wolkenlos'), 
	//'mostlySunny', 

	// clear

	'01d' => array(
		'name' => 'Klar', 
		'class' => 'clear', 
		'flickrsearch' => urlencode('sun sonne'),
		//'flickrtag' => 'sun',
		'icon' => 'icon-sun'),
	'01n' => array(
		'name' => 'Klar', 
		'class' => 'moon', 
		'flickrsearch' => urlencode('night nacht mond moon'),
		//'flickrtag' => 'moon',
		'icon' => 'icon-moon'),

	// leichte wolken

	'02d' => array(
		'name' => 'Leicht Bewölkt', 
		'class' => 'fewclouds', 
		//'flickrsearch' => urlencode('cloudy -night'),
		'flickrtag' => 'cloudy,-night,-nacht',
		//'flickrsearch' => urlencode('-art -instagram cloudy OR bewölkt OR wolken OR clouds -night -nacht -mond -moon -gewitter -regen'),
		//'flickrtag' => '-night,-nacht',
		'icon' => 'icon-cloudy'),
	'02n' => array(
		'name' => 'Leicht Bewölkt', 
		'class' => 'moon', 
		'flickrsearch' => urlencode('night nacht'),
		'icon' => 'icon-moon'),


	// bewölkt

	'03d' => array(
		'name' => 'Bewölkt', 
		'class' => 'cloudy', 
		'flickrsearch' => urlencode('(-art -instagram) AND (cloudy OR bewölkt OR wolken OR clouds) AND (-night -nacht -mond -moon -gewitter -regen)'),
		'icon' => 'icon-cloud-2'),

	'03n' => array(
		'name' => 'Bewölkt', 
		'class' => 'moon', 
		'flickrtag' => 'night',
		'icon' => 'icon-moon'),

	// stark bewölkt

	'04d' => array(
		'name' => 'Stark Bewölkt', 
		'class' => 'brokenclouds', 
		'flickrsearch' => urlencode('-art -instagram cloudy OR bewölkt OR wolken OR clouds -night -nacht -mond -moon'),
		'icon' => 'icon-cloudy-2'),
	'04n' => array(
		'name' => 'Stark Bewölkt', 
		'class' => 'moon', 
		'flickrtag' => 'night',
		'icon' => 'icon-cloudy-2'),


	// regen schauer

	'09d' => array(
		'name' => 'Regen Schauer', 
		'class' => 'showerrain', 
		'flickrtag' => 'rain',
		'icon' => 'icon-rainy'),
	'09n' => array(
		'name' => 'Regen Schauer', 
		'class' => 'moon', 
		'flickrtag' => 'night',
		'icon' => 'icon-moon'),

	// regen

	'10d' => array(
		'name' => 'Regen', 
		'class' => 'rain', 
		'flickrtag' => 'rain',
		'icon' => 'icon-rainy'),
	'10n' => array(
		'name' => 'Regen', 
		'class' => 'moon', 
		'flickrtag' => 'night',
		'icon' => 'icon-rainy'),


	// gewitter

	'11d' => array(
		'name' => 'Gewitter', 
		'class' => 'lightning', 
		'flickrtag' => 'lightning',
		'icon' => 'icon-lightning'),

	'11n' => array(
		'name' => 'Gewitter', 
		'class' => 'lightning', 
		'flickrtag' => 'lightning',
		'icon' => 'icon-lightning'),
);