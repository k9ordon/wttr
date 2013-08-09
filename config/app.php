<?

$config['base'] = 'http://'.$_SERVER['SERVER_NAME'] . '';
$config['contentBase'] = $config['base'];

$config['weekdays'] = array(
	'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samastag', 'Sonntag'
	);
$config['weekdaysShort'] = array(
	'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa', 'So'
	);


$config['weatherTypes'] = array(
	//'clear' => array('name' => 'Wolkenlos'), 
	//'mostlySunny', 

	// clear

	'01d' => array(
		'name' => 'Klar', 
		'class' => 'clear', 
		'flickrtag' => 'sonne',
		'icon' => 'icon-cloudy'),
	'01n' => array(
		'name' => 'Klar', 
		'class' => 'moon', 
		'flickrtag' => 'moon',
		'icon' => 'icon-moon'),

	// leichte wolken

	'02d' => array(
		'name' => 'Leicht Bewölkt', 
		'class' => 'fewclouds', 
		'flickrtag' => 'cloudy',
		'icon' => 'icon-cloudy'),
	'02n' => array(
		'name' => 'Leicht Bewölkt', 
		'class' => 'fewclouds', 
		'flickrtag' => 'night',
		'icon' => 'icon-moon'),


	// bewölkt

	'03d' => array(
		'name' => 'Bewölkt', 
		'class' => 'cloudy', 
		'flickrtag' => 'cloudy',
		'icon' => 'icon-cloud-2'),
	'03n' => array(
		'name' => 'Bewölkt', 
		'class' => 'cloudy', 
		'flickrtag' => 'night',
		'icon' => 'icon-moon'),

	// stark bewölkt

	'04d' => array(
		'name' => 'Stark Bewölkt', 
		'class' => 'brokenclouds', 
		'flickrtag' => 'cloudy',
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
		'flickrtag' => 'sunny',
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