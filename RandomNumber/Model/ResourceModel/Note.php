<?php


namespace Alevel\RandomNumber\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Note extends AbstractDb
{

    protected function _construct()
    {
        $this->_init('note_orders','id');
    }
}
