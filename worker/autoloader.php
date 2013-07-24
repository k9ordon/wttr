<?

function autoload($class) {
	global $config;

	//echo '<hr>' .$class . ' => ';
	$cl = mb_strtolower($class);
	$fn = str_replace('_', '/', $cl);
	if($cl === $fn) $fn = $cl . '/' . $cl;

	//echo $config['documentRoot'] . "/{$fn}.php";

    if (is_readable($config['documentRoot'] . "/{$fn}.php")) require $config['documentRoot'] . "/{$fn}.php";
    elseif (is_readable($config['documentRoot'] . "/../{$fn}.php")) require $config['documentRoot'] . "/../{$fn}.php";
    else echo(' Not found: ' . $fn);
}

spl_autoload_register('autoload');