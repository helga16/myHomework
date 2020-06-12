<?php


namespace Alevel\Rewrite\Block\Product\View;
use Magento\Catalog\Block\Product\View\Description;

class Descriptionmy extends Description
{
    public function __construct(\Magento\Framework\View\Element\Template\Context $context, \Magento\Framework\Registry $registry, array $data = [])
    {
        parent::__construct($context, $registry, $data);
    }

}
