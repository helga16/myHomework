<?php


namespace Alevel\Orders\Model\ResourceModel\Status;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Alevel\Orders\Model\Status as Model;
use Alevel\Orders\Model\ResourceModel\Status as ResourceModel;


class Collection extends AbstractCollection
{


    public function _construct()
    {
       $this->_init(Model::class,ResourceModel::class);
    }
}
