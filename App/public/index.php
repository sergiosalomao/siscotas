<?php


use App\Controller\ConfiguratorController;
use App\Controller\DataBaseController;
use Presto\Controller\LanguageController;

session_start();
ini_set('display_errors', 0);
require_once '../vendor/autoload.php';


# Boot - Configurations
$conf = new ConfiguratorController();
$db = new DataBaseController();
$language = (new LanguageController())->setLanguage($conf->getLanguage());
$_SESSION['APP_INFO'] = $conf->getAppInfo();


if ($db->connectDb($conf->getDsn()) ? $_SESSION['DB_STATUS'] = 'true' : $_SESSION['DB_STATUS'] = 'true') ;
$_SESSION['DB_STATUS'];

#Routers
$request = $_SERVER['REQUEST_URI'];
if (!isset($_SESSION['LOGIN_STATUS']) || $_SESSION['LOGIN_STATUS'] == 'false') {
    $requestPart = explode('/', $request);
    if (isset($requestPart[1]) && $requestPart[1] !== 'login')
        header("location:/login");
}

$routes = include '../config/routes.php';

if (! isset($routes[$request])) {
    die('Página não encontrada');
}

$controller = $routes[$request]['controller'];
$method = $routes[$request]['method'];
(new $controller) -> $method();





