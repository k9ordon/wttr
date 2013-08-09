<?

// bootstrap app
include 'config.php';
include '../enviroment.php';

// bootstrap frontend
include 'autoloader.php';

$owm = new Model_OWM();
$weaterPageArray = $owm->getCurrent();

//var_dump($config['fake']['locationData']);exit;
var_dump($weaterPageArray);