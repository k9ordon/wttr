<?

$config['base'] = 'http://'.$_SERVER['SERVER_NAME'] . '';
$config['contentBase'] = $config['base'];

$config['weekdays'] = array(
	'Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'
	);
$config['weekdaysShort'] = array(
	'So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'
	);

$nightQuery = 'night OR nacht OR mond OR moon';
$nightTags = 'wetter,weather,sun,rain,sky';

$config['weatherTypes'] = array(
	//'clear' => array('name' => 'Wolkenlos'), 
	//'mostlySunny', 

	// clear

	'01d' => array(
		'name' => 'Klar', 
		'class' => 'clear', 
		'flickrsearch' => 'sun sonne',
		//'flickrtag' => 'sun',
		'icon' => 'icon-sun'),
	'01n' => array(
		'name' => 'Klar', 
		'class' => 'moon', 
		'flickrsearch' => $nightQuery,
		'flickrtag' => $nightTags,
		'icon' => 'icon-moon'),

	// leichte wolken

	'02d' => array(
		'name' => 'Leicht Bewölkt', 
		'class' => 'fewclouds', 
		//'flickrsearch' => 'cloudy -night'),
		'flickrsearch' => 'wolken clouds',
		//'flickrsearch' => '-art -instagram cloudy OR bewölkt OR wolken OR clouds -night -nacht -mond -moon -gewitter -regen'),
		//'flickrtag' => '-night,-nacht',
		'icon' => 'icon-cloudy'),
	'02n' => array(
		'name' => 'Leicht Bewölkt', 
		'class' => 'moon', 
		'flickrsearch' => $nightQuery,
		'flickrtag' => $nightTags,
		'icon' => 'icon-moon'),


	// bewölkt

	'03d' => array(
		'name' => 'Bewölkt', 
		'class' => 'cloudy', 
		'flickrsearch' => 'wolken clouds',
		//'flickrtags' => 'rain,regen',	
		'icon' => 'icon-cloud-2'),

	'03n' => array(
		'name' => 'Bewölkt', 
		'class' => 'moon', 
		'flickrsearch' => $nightQuery,
		'flickrtag' => $nightTags,
		'icon' => 'icon-moon'),

	// stark bewölkt

	'04d' => array(
		'name' => 'Stark Bewölkt', 
		'class' => 'brokenclouds', 
		'flickrsearch' => 'wolken clouds',
		'icon' => 'icon-cloudy-2'),
	'04n' => array(
		'name' => 'Stark Bewölkt', 
		'class' => 'moon', 
		'flickrsearch' => $nightQuery,
		'flickrtag' => $nightTags,
		'icon' => 'icon-cloudy-2'),


	// regen schauer

	'09d' => array(
		'name' => 'Regen Schauer', 
		'class' => 'showerrain', 
		'flickrsearch' => 'Regen',
		'flickrtags' => 'rain,regen',
		'icon' => 'icon-rainy'),
	'09n' => array(
		'name' => 'Regen Schauer', 
		'class' => 'moon', 
		'flickrsearch' => $nightQuery,
		'flickrtag' => $nightTags,
		'icon' => 'icon-moon'),

	// regen

	'10d' => array(
		'name' => 'Regen', 
		'class' => 'rain', 
		'flickrsearch' => 'rain regen',
		'flickrtags' => 'cloud,himmel',
		'icon' => 'icon-rainy'),
	'10n' => array(
		'name' => 'Regen', 
		'class' => 'moon', 
		'flickrsearch' => $nightQuery,
		'flickrtag' => $nightTags,
		'icon' => 'icon-rainy'),


	// gewitter

	'11d' => array(
		'name' => 'Gewitter', 
		'class' => 'lightning', 
		'flickrsearch' => 'gewitter thunderstorm',
		'icon' => 'icon-lightning'),

	'11n' => array(
		'name' => 'Gewitter', 
		'class' => 'moon', 
		'flickrsearch' => 'gewitter thunderstorm',
		'icon' => 'icon-lightning'),
);