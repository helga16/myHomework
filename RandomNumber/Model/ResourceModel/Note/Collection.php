<?php


namespace Alevel\RandomNumber\Model\ResourceModel\Note;

use Alevel\RandomNumber\Model\ResourceModel\Note as ResMod;
use Alevel\RandomNumber\Model\Note as Model;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
public function _construct(){
    $this->_init(Model::class,ResMod::class);
}
}
