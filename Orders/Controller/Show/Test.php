<?php


namespace Alevel\Orders\Controller\Show;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Alevel\Orders\Repository\AjaxService;
use Alevel\Orders\Repository\AjaxRepository;

class Test extends Action
{
    private $context;
    /**
     * @var AjaxService;
     */

    private $customerService;

    /**
     * @var AjaxRepository;
     */
    private $customerRepository;


    public function __construct(
        Context $context,
                AjaxService $customerService,
        AjaxRepository $customerRepository

    ){
        parent::__construct($context);

        $this->context = $context;
        $this->customerService = $customerService;
        $this->customerRepository = $customerRepository;
    }

    public function execute()
    {
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);

        if($this->getRequest()->isAjax()) {
            if ($this->getRequest()->getParam('name')) {
                $param = $this->getRequest()->getParam('name');
                $newObject = $this->customerService->prepareObjectCustomer($param);
                $this->customerRepository->save($newObject);
            }

            return $resultJson->setData($this->customerService->prepareMessagesList());

        }




        return $resultJson->setData(
            [
                'param' =>$param,
                'errors' => false,
                'message' => __('You took part in the action!')
            ]
        );
    }
}
