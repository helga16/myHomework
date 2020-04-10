<?php

namespace Controller;

use Framework\Controller\AbstractController;

class Index extends AbstractController
{
    public function index()
    {
        return $this->view->generate('framework/index.phtml', ['text' => 'Все видели как я это сделал ибо я отказываюсь повторять', 'img'=> 'https://raw.githubusercontent.com/Bandydan/php_oop_block/master/images/sparrow.jpeg']);
    }
}
