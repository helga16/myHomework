<?php


namespace Alevel\Orders\Model\ResourceModel\Orders;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Alevel\Orders\Model\Orders as Model;
use Alevel\Orders\Model\ResourceModel\Orders as ResourceModel;


class Collection extends AbstractCollection
{


    public function _construct()
    {
       $this->_init(Model::class,ResourceModel::class);
    }
}
