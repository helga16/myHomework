<?php


namespace Alevel\RandomNumber\Controller\Adminhtml\Edit;


use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;

class Inlineedit extends Action
{


    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        return $result;
    }
}
