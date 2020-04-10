<?php

namespace Controller;

use \Framework\Controller\AbstractController;
use \Framework\Model\Textmodel;


class Text extends AbstractController
{
    public function text()
    {
    	$model = new Textmodel();
    	$textik=$model->getInfo('value','info');
        return $this->view->generate('framework/text.phtml', [ 'text'=> $textik]);
    }
}

