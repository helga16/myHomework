<?php


namespace Alevel\Orders\Model;

use Magento\Framework\Model\AbstractModel;
use Alevel\Orders\Model\ResourceModel\Orders as ResourceModel;

class Orders extends AbstractModel
{

public function _construct()
{
    $this->_init(ResourceModel::class);
}

}
