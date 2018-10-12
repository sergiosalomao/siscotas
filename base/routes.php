<?php session_start();
#routes
include_once 'app/src/Controller/Interfaces/InterfaceController.php';
include_once 'app/src/Controller/Controller.php';
include_once 'app/src/Controller/IndexController.php';

##======================================================================================

$route = $_SERVER['REQUEST_URI'];

switch ($route) {
    case ('/' || '/siscotas') :

        $index = new IndexController();
        $index->indexAction();
        break;
    default:
        echo 'Controller nao encontrado.';
}


