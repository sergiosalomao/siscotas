<?php
namespace App;

use App\Controller\ConfiguratorController;
use App\Controller\DataBaseController;
use App\Controller\LoginController;
use App\Controller\IndexController;

session_start();
require_once '../vendor/autoload.php';


# Boot - Configurations
$conf = new ConfiguratorController();
$db = new DataBaseController();

$_SESSION['APP_INFO'] = $conf->getAppInfo();
$_SESSION['LANGUAGE'] = $conf->getLanguage();
if ($db->connectDb($conf->getDsn()) ? $_SESSION['DB_STATUS'] = 'true' : $_SESSION['DB_STATUS'] = 'true') ;
$_SESSION['DB_STATUS'];

#Routers

$route = $_SERVER['REQUEST_URI'];
if (!isset($_SESSION['LOGIN_STATUS']) || $_SESSION['LOGIN_STATUS'] == 'false') {
    $routePart = explode('/', $route);
    if (isset($routePart[1]) && $routePart[1] !== 'login')
        header("location:/login");
}
switch ($route) {
    case ('/') :
        $index = new IndexController();
        $index->indexAction();
        break;

    case ('/login') :
        $login = new LoginController();
        $login->indexAction();
        break;

    case ('/login/register') :
        $login = new LoginController();
        $login->registerAction();
        break;

    case ('/login/create') :
        $login = new LoginController();
        $login->createNewUserAction();
        break;

    case ('/login/forgot') :
        $login = new LoginController();
        $login->forgotPasswordAction();
        break;

    case ('/login/reset') :
        $login = new LoginController();
        $login->resetPasswordAction();
        break;

    case ('/login/validator') :
        $login = new LoginController();
        $login->verifyPassword();
        break;

    case ('/login/list') :
        $login = new LoginController();
        $login->listAction();
        break;

    default:
        echo 'Controller nao encontrado.';
}
?>




