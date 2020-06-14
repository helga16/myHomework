<?php


namespace Alevel\Orders\Controller\Adminhtml\Products;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    /**
     * @return Page|\Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $page =  $resultJson = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $page->setActiveMenu('Alevel_Orders::alevel_orders_products');
        $page->getConfig()->getTitle()->prepend(__('Alevel_Orders'));
        return $page;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Alevel_Orders::products_list_access');
    }
}
