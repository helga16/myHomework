<?php


namespace Alevel\RandomNumber\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Alevel\RandomNumber\Repository\NoteRepository;

class Noteorder implements ObserverInterface
{
    private $repository;
    public function __construct(
        NoteRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function execute(Observer $observer)
    {
        $item = $observer->getEvent()->getData('quote');
        $email = $item->getCustomerEmail();
        $customerLastname = $item->getCustomer()->getLastname();
        $customerId = $item->getCustomer()->getId();
        $arrItems = $item->getAllItems();

            foreach($arrItems as $val){
          $productId = $val->getProduct()->getId();
          $prodSKU = $val->getProduct()->getSku();
          $prodQty  = $val->getProduct()->getQty();



       }
        //$prodSKU = $item->getProduct()->getSku();
        //getLastname();
        //$email = $item->getCustomer()->getEmail();
        //$customerId = $item->getCustomer()->getId();

        //$product = $item->getName();
      //  $product = $item->getSku();
       // $product = $item->getQty();
        //$product = $item->getId();

        //$customer = $product->getCustomerFirstname();
        $saveNote = $this->repository->prepareObjectNote($customerId,$customerLastname,$email,$prodSKU,$prodQty);
        $this->repository->save($saveNote);

    }
}
