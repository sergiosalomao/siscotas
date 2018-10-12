<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 02/10/2018
 * Time: 22:49
 */

namespace App\Controller;

use Presto\Controller\LanguageController;


abstract class Controller
{
    private $control;
    private $view;
    private $layout = 'default';
    private $session;



    public function __construct()
    {
        #passa Layout Padrao
        $this->layout = $this->layout();
        $session = new SessionController();
        $this->session = $session;

    }

    protected function layout(string $layoutName=null)
    {

        if ($layoutName == NULL) $layoutName = 'default';
        $this->layout = $layoutName;
        $fileName = "../src/View/layout/$this->layout/$this->layout.phtml";
        if (!file_exists($fileName)) {
            die("Erro: Layout, $fileName não encontrada");
        }
        include_once $fileName;
    }

    protected function noLayout()
    {
        $this->layout = null;

    }

    public function render(string $controller, string $view)
    {
        #Recebe o Controller
        $this->control = $controller;

        #Recebe a view
        $this->view = $view;
        $this->view();
    }

    public function view()
    {
        $fileName = "../src/View/$this->control/$this->view.phtml";
        if (!file_exists($fileName)) {
            die("Erro: View, $fileName não encontrada");
        }
        include_once $fileName;
    }

    public function partials(string $partial)
    {
        $fileName = "../src/View/$this->control/partials/$partial.phtml";
        if (!file_exists($fileName)) {
            die("Erro: Partial, $fileName não encontrado");
        }
        include_once $fileName;
    }


}