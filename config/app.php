<?

$config['base'] = 'http://'.$_SERVER['SERVER_NAME'] . '';
$config['contentBase'] = $config['base'];


$config['weatherTypes'] = array(
	//'clear' => array('name' => 'Wolkenlos'), 
	//'mostlySunny', 
	'sunny' => array('name' => 'Sonnig', 'class' => 'sunny'), 
	'partlyCloudy' => array('name' => 'Leicht Bewölkt', 'class' => 'partlycloudy'), 
	'rain' => array('name' => 'Regen', 'class' => 'rain')
);