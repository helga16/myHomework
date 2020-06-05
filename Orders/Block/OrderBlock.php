<?php


namespace Alevel\Orders\Block;

use Alevel\Orders\Api\Repository\OrderRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;


class OrderBlock extends Template
{
    /**
     * @var OrderRepositoryInterface
     */
    private $repository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(
        Template\Context $context,
        OrderRepositoryInterface $repository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SerializerInterface $serializer,
        array $data = []
    ) {
        $this->repository = $repository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->serializer = $serializer;
        parent::__construct($context, $data);
    }


    public function getJsLayout()
    {
        $result = json_decode(parent::getJsLayout(),true);
        $result['components']['alevel-component']['age'] = 'test';


        return json_encode($result);
    }


public function getAll(){
        $orders = $this->repository->getAll();
        return $orders;
}
    public function getOrders()
    {
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('order_id', 3, 'gt')
            ->setPageSize(10)
            ->create();

        $orders = $this->repository->getList($searchCriteria);

        return $orders;
    }
    public function getNotes(){
        $searchCriteria= $this->searchCriteriaBuilder->create();
        $notes = $this->repository->getListAjax($searchCriteria);

        return $notes;
    }

    public function getJsonConfig()
    {
        $orders = $this->getUsers()->getItems();
        $config = [];

        foreach ($orders as $order) {
            $config[] = $order->getData();
        }

        return $this->serializer->serialize($config);
    }

}
