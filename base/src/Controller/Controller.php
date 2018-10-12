<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 02/10/2018
 * Time: 22:49
 */

abstract class Controller
{
    private $view;
    private $layout = 'default';

    protected function layout(string $layoutName = 'default')
    {
        $this->layout = $layoutName;
    }

    protected function render(string $view)
    {
        $this->view = $view;
        include_once "App/src/View/layout/$this->layout/$this->layout.phtml";
    }

    protected function navbar()
    {
        include_once "App/src/View/$this->view/partials/navbar.phtml";
    }

    protected function content()
    {
        include_once "App/src/View/$this->view/$this->view.phtml";
    }

    protected function footer()
    {
        include_once "App/src/View/$this->view/partials/footer.phtml";
    }


}