<?php


namespace Alevel\RandomNumber\Controller\Adminhtml\Cart;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;
class Index extends Action
{

    public function execute()
    {
        $page=$this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $page->setActiveMenu('Alevel_RandomNumber::child1');
        $page->getConfig()->getTitle()->prepend(__('Observer Grid'));
        return $page;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Alevel_RandomNumber::child1');
    }
}

