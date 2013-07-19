<?

function autoload($class) {

	//echo '<hr>' .$class . ' => ';
	$cl = mb_strtolower($class);
	$fn = str_replace('_', '/', $cl);
	if($cl === $fn) $fn = $cl . '/' . $cl;

	//echo $_SERVER['DOCUMENT_ROOT'] . "/{$fn}.php";

    if (is_readable($_SERVER['DOCUMENT_ROOT'] . "/{$fn}.php")) require $_SERVER['DOCUMENT_ROOT'] . "/{$fn}.php";
    elseif (is_readable($_SERVER['DOCUMENT_ROOT'] . "/../{$fn}.php")) require $_SERVER['DOCUMENT_ROOT'] . "/../{$fn}.php";
    //else echo(' Not found: ' . $fn);
}

spl_autoload_register('autoload');