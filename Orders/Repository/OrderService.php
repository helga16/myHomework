<?php

namespace Alevel\Orders\Repository;

use Alevel\Orders\Model\OrdersFactory;
use Magento\Framework\Api\SearchCriteriaBuilderFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Alevel\Orders\Repository\OrderRepository as OrderRepository;

class OrderService
{

    private $customer;
    private $criteriaBuilderFactory;
    private $orderRepository;

    public function __construct(
        OrdersFactory $customer,
 SearchCriteriaBuilderFactory $criteriaBuilderFactory,
        OrderRepository $orderRepository
    ) {
        $this->customer = $customer;
        $this->criteriaBuilderFactory = $criteriaBuilderFactory;
        $this->orderRepository = $orderRepository;
    }

    public function prepareObjectCustomer($nameAjax)
    {
        $customerObject = $this->customer->create();
        $customerObject->setCustomerName($nameAjax);

        return $customerObject;
    }

    public function prepareMessagesList()
    {
        /** @var SearchCriteriaBuilder $criteriaBuilder */
        $criteriaBuilder = $this->criteriaBuilderFactory->create();
        $criteria = $criteriaBuilder->create();
        $messages = $this->orderRepository->getListAjax($criteria)->getItems();

        $messagesItems = array_map(
            function ($message) {
                return [

                    'name' => $message->getCustomerName()

                ];
            }, $messages
        );


        return $messagesItems;
    }

}
