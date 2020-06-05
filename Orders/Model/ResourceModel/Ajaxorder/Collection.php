<?php


namespace Alevel\Orders\Model\ResourceModel\Ajaxorder;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Alevel\Orders\Model\Ajaxorder as Model;
use Alevel\Orders\Model\ResourceModel\Ajaxorder as ResourceModel;


class Collection extends AbstractCollection
{


    public function _construct()
    {
       $this->_init(Model::class,ResourceModel::class);
    }
}
