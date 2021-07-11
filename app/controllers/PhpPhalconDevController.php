<?php

class PhpPhalconDevController extends ControllerBase
{

    public function indexAction()
    {
        return $this->view->pick('index/index');
    }

}
