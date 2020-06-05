<?php


namespace Alevel\Orders\Api\Repository;

use Alevel\Orders\Api\Model\OrderInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

interface OrderRepositoryInterface
{
 /**
     * Get user by ID
     *
     * @param int $id
     * @return OrderInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id): OrderInterface;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface;

    /**
     * @param OrderInterface $order
     * @return OrderInterface
     * @throws CouldNotSaveException
     */
    public function save(OrderInterface $order): OrderInterface;

    /**
     * @param OrderInterface $order
     * @return OrderRepositoryInterface
     * @throws CouldNotDeleteException
     */
    public function delete(OrderInterface $order): OrderRepositoryInterface;

    /**
     * @param int $id
     * @return OrderRepositoryInterface
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function deleteById(int $id): OrderRepositoryInterface;

}
