<?php


namespace Alevel\RandomNumber\Model;


use Magento\Framework\Model\AbstractModel;
use Alevel\RandomNumber\Model\ResourceModel\Note as ResourceModel;

class Note extends AbstractModel
{
public function _construct()
{
    $this->_init(ResourceModel::class);
}
}
