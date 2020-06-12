<?php


namespace Alevel\RandomNumber\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Login implements ObserverInterface
{

    public function execute(Observer $observer)
    {
       $event = $observer->getEvent();
    }

}
