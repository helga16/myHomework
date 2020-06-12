<?php


namespace Alevel\RandomNumber\Repository;


use Alevel\RandomNumber\Model\ResourceModel\Note as ResourceModel;
use Alevel\RandomNumber\Model\NoteFactory as ModelFactory;
use Alevel\RandomNumber\Model\Note as Model;
use Alevel\RandomNumber\Model\ResourceModel\Note\Collection;
use Alevel\RandomNumber\Model\ResourceModel\Note\CollectionFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class NoteRepository
{

    private $resource;

    private $modelFactory;

    private $collectionFactory;


    private $processor;

    /**
     * @var SearchResultsInterfaceFactory
     */
    private $searchResultFactory;

    public function __construct(
        ResourceModel $resource,
        ModelFactory $modeFactory,
        CollectionFactory $collectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        SearchResultsInterfaceFactory $searchResultFactory
    )
    {
        $this->resource = $resource;
        $this->modelFactory = $modeFactory;
        $this->collectionFactory = $collectionFactory;
        $this->processor = $collectionProcessor;
        $this->searchResultFactory = $searchResultFactory;
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

    public function save(Model $order): Model
    {
        try {
            $this->resource->save($order);
        } catch (\Exception $e) {
            // added logger
            throw new CouldNotSaveException(__("User could not save"));
        }

        return $order;
    }
    public function prepareObjectNote($id,$name,$email,$sku,$qty)
    {
        $customerObject = $this->modelFactory->create();
        $customerObject->setCustomerid($id);
        $customerObject->setName($name);
        $customerObject->setEmail($email);
        $customerObject->setSku($sku);
        $customerObject->setQty($qty);



        return $customerObject;
    }

}
