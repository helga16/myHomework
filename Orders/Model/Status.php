<?php


namespace Alevel\Orders\Model;
use Magento\Framework\Model\AbstractModel;
use Alevel\Orders\Model\ResourceModel\Status as ResourceModels;


class Status extends AbstractModel
{
    public function _construct()
    {
        $this->_init(ResourceModels::class);
    }

}





