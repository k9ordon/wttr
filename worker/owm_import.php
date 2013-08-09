<?

// bootstrap app
include 'config.php';
include '../enviroment.php';

// bootstrap frontend
include 'autoloader.php';

$owm = new Model_OWM();
//var_dump($owm->getHours());
var_dump($owm->getWeather());

//var_dump($meminstance);

//var_dump($config['fake']['locationData']);exit;
//var_dump($currentWeather);