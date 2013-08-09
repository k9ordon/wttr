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
	'sunny' => array('name' => 'Sonnig', 'class' => 'sunny', 'flickrtag' => 'sunny'), 
	'partlyCloudy' => array('name' => 'Leicht Bewölkt', 'class' => 'partlycloudy', 'flickrtag' => 'cloudy'), 
	'rain' => array('name' => 'Regen', 'class' => 'rain', 'flickrtag' => 'rain')
);