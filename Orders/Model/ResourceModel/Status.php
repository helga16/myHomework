<?php


namespace Alevel\Orders\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;


class Status extends AbstractDb
{

    public function _construct()
    {
        $this->_init("level_quick_order_status",'status_id');
    }
}

