<?php


namespace Alevel\Orders\Repository;


use Alevel\Orders\Api\Model\OrderInterface;
use Alevel\Orders\Api\Repository\OrderRepositoryInterface;
use Alevel\Orders\Model\ResourceModel\Orders as ResourceModel;
use Alevel\Orders\Model\ResourceModel\Ajaxorder as ResourceModelAjax;
use Alevel\Orders\Model\ResourceModel\Orders\Collection;
use Alevel\Orders\Model\ResourceModel\Ajaxorder\Collection as CollectionAjax;
use Alevel\Orders\Model\ResourceModel\Orders\CollectionFactory;
use Alevel\Orders\Model\ResourceModel\Ajaxorder\CollectionFactory as CollectionFactoryAjax;
use Alevel\Orders\Model\OrdersFactory as ModelFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class OrderRepository implements OrderRepositoryInterface
{

    /**
     * @var ResourceModel
     */
    private $resource;

    private $resourceAjax;

    /**
     * @var ModelFactory
     */
    private $modelFactory;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;
    private $collectionFactoryAjax;

    /**
     * @var CollectionProcessorInterface
     */
    private $processor;

    /**
     * @var SearchResultsInterfaceFactory
     */
    private $searchResultFactory;

    public function __construct(
        ResourceModel $resource,
        ResourceModelAjax $resourceAjax,
        ModelFactory $modeFactory,
        CollectionFactory $collectionFactory,
        CollectionFactoryAjax $collectionFactoryAjax,
        CollectionProcessorInterface $collectionProcessor,
        SearchResultsInterfaceFactory $searchResultFactory
    ) {
        $this->resource             = $resource;
        $this->resourceAjax        = $resourceAjax;
        $this->modelFactory         = $modeFactory;
        $this->collectionFactory    = $collectionFactory;
        $this->collectionFactoryAjax    = $collectionFactoryAjax;
        $this->processor            = $collectionProcessor;
        $this->searchResultFactory  = $searchResultFactory;
    }

    public function getById(int $id): OrderInterface
    {
        $order = $this->modelFactory->create();

        $this->resource->load($order, $id);

        if (empty($order->getId())) {
            throw new NoSuchEntityException(__("Order %1 not found", $id));
        }

        return $order;
    }
public function getAll(){
    /** @var Collection $collection */
    $collection = $this->collectionFactory->create();
    return $collection->getItems();
}

    public function getListAjax(SearchCriteriaInterface $searchCriteria): SearchResultsInterface
    {
        $collectionAjax = $this->collectionFactoryAjax->create();

        $this->processor->process($searchCriteria, $collectionAjax);

        /** @var SearchResultsInterface $searchResult */
        $searchResult = $this->searchResultFactory->create();

        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setTotalCount($collectionAjax->getSize());
        $searchResult->setItems($collectionAjax->getItems());

        return $searchResult;
    }
    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface
    {
        /** @var Collection $collection */
        $collection = $this->collectionFactory->create();

        $this->processor->process($searchCriteria, $collection);

        /** @var SearchResultsInterface $searchResult */
        $searchResult = $this->searchResultFactory->create();

        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setItems($collection->getItems());

        return $searchResult;
    }

    public function save(OrderInterface $order): OrderInterface
    {
        try {
            $this->resource->save($order);
        } catch (\Exception $e) {
            // added logger
            throw new CouldNotSaveException(__("User could not save"));
        }

        return $order;
    }

    public function delete(OrderInterface $order): OrderRepositoryInterface
    {
        try {
            $this->resource->delete($order);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException("Order not delete");
        }

        return $this;
    }

    public function deleteById(int $id): OrderRepositoryInterface
    {
        $order = $this->getById($id);
        $this->delete($order);

        return $this;
    }
}
