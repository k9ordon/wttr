<?
// bootstrap app
include 'config.php';
include '../enviroment.php';

// bootstrap frontend
session_start();
include 'autoloader.php';
include '../library/router/mvc.php';

$router = new Router_Mvc($config);
$router->run();