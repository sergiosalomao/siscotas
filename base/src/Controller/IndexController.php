<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 02/10/2018
 * Time: 22:48
 */

class IndexController extends Controller implements InterfaceController
{
    private $className;
    private $className_prefix;

    public function __construct()
    {
        $this->className = get_class();
        $this->classNamePrefix = substr(get_class(), 0, -10);
    }

    public function indexAction()
    {
        $this->render('index');
    }


}