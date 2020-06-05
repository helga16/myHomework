<?php


namespace Alevel\Orders\Model;

use Alevel\Orders\Api\Model\OrderInterface;
use Magento\Framework\Model\AbstractModel;
use Alevel\Orders\Model\ResourceModel\Orders as ResourceModel;

class Orders extends AbstractModel implements OrderInterface
{

public function _construct()
{
    $this->_init(ResourceModel::class);
}
public function getName(){
 return $this->getData(OrderInterface::NAME_FIELD);
}
public function getEmail(){
 return $this->getData(OrderInterface::EMAIL_FIELD);
}
public function getId(){
return $this->getData(OrderInterface::ID_FIELD);
}


}
