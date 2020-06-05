<?php


namespace Alevel\Orders\Model;
use Magento\Framework\Model\AbstractModel;
use Alevel\Orders\Model\ResourceModel\Ajaxorder as ResourceModels;


class Ajaxorder extends AbstractModel
{
    const LABEL = 'label';
    public function _construct()
    {
        $this->_init(ResourceModels::class);
    }

    public function getCustomerName()
    {
        return $this->getData(self::LABEL);
    }

    public function setCustomerName($name)
    {
        $this->setData(self::LABEL, $name);
    }

}





