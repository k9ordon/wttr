<?

// bootstrap app
include 'config.php';
include '../enviroment.php';

// bootstrap frontend
include 'autoloader.php';

$zamg = new Model_Zamg();
$zamgArray = $zamg->getWeather();

//var_dump($config['fake']['locationData']);exit;
var_dump($zamgArray);