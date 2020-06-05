<?php


namespace Alevel\Orders\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;


class Ajaxorder extends AbstractDb
{

    public function _construct()
    {
        $this->_init("ajax_order",'id');
    }

}

