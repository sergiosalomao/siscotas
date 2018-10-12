<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 02/10/2018
 * Time: 22:48
 */

namespace App\Controller;
use App\Controller\Interfaces\InterfaceController;

class IndexController extends Controller implements InterfaceController
{
    private $className;
    private $className_prefix;
    protected $controller;

    public function __construct()
    {
        $this->className = get_class();
        $this->classNamePrefix = substr(get_class(), 0, -10);
        $this->controller = substr(get_class(), 15, -10);
    }

    public function indexAction()
    {
        $this->layout();
        $this->render('index','index');
    }

}