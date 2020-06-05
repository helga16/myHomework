<?php

namespace Alevel\Orders\Repository;



use Alevel\Orders\Model\Ajaxorder;
use Alevel\Orders\Model\ResourceModel\Ajaxorder as ResModel;

class AjaxRepository
{
private $resource;

    public function __construct(
        ResModel $resource

    )
    {
        $this->resource = $resource;
    }
    public function save(Ajaxorder $customer)
    {
        $this->resource->save($customer);

        return $customer;
    }
}
