<?php


namespace Alevel\Orders\Setup\Patch\Data;

use Alevel\Orders\Model\StatusFactory;

use Alevel\Orders\Model\OrdersFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\DB\TransactionFactory;

class AddOrders implements DataPatchInterface
{
    private $modelStatusFactory;
    private $modelOrdersFactory;

    private $transactionFactory;

    public function __construct(
        StatusFactory $statusFactory,

        OrdersFactory $ordersFactory,
        TransactionFactory $transactionFactory
    )
    {
        $this->modelOrdersFactory = $ordersFactory;
        $this->modelStatusFactory = $statusFactory;

        $this->transactionFactory = $transactionFactory;
    }

    /**
     * @inheritDoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function apply()
    {
        /** @var \Magento\Framework\DB\Transaction $transaction */
        $transaction = $this->transactionFactory->create();
        $arrOrders = [
            ['name'=>'Dima','email'=>'mymail@mail.com'],
            ['name'=>'Ann','email'=>'my2mail@mail.com'],
            ['name'=>'Petr','email'=>'my3mail@mail.com'],
            ['name'=>'Kate','email'=>'my4mail@mail.com'],
            ['name'=>'Jonn','email'=>'my5mail@mail.com'],
            ['name'=>'Antony','email'=>'my6mail@mail.com'],
            ['name'=>'David','email'=>'my7mail@mail.com']
        ];

        foreach($arrOrders as $item) {
            $modelOrder = $this->modelOrdersFactory->create();
            $modelOrder->setCustomerName($item['name']);
            $modelOrder->setEmail($item['email']);
            $modelOrder->setStatusId(1);
            $transaction->addObject($modelOrder);
        }

        $transaction->save();
    }

}

