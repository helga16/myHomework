<?php


namespace Alevel\Orders\Block;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;


class OrderBlock extends Template
{

    public function __construct(
        Context $context,

        array $data = [])
    {
        parent::__construct($context, $data);
    }

    public function getOrders(){
        return 'hello';
    }
}
