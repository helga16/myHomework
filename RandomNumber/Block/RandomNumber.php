<?php


namespace Alevel\RandomNumber\Block;
use Alevel\RandomNumber\Provider\RandomInterface;
use Alevel\RandomNumber\Observer\Noteorder;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;


class RandomNumber extends Template
{
    /**
     * @var RandomInterface
     */
    private $provider;


    /**
     * RandomNumber constructor.
     * @param Context $context
     * @param RandomInterface $random
     * @param array $data
     */
    public function __construct(
        Context $context,
        RandomInterface $random,

        array $data = [])
    {

        $this->provider = $random;
        parent::__construct($context, $data);
    }

    public function getRandomNumber(){
        return $this->provider->getNumber();
    }
    public function showInfo(){
        return $this->provider->getValueForBlock();
    }


}
