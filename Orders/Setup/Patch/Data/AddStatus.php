<?php


namespace Alevel\Orders\Setup\Patch\Data;

use Alevel\Orders\Model\StatusFactory;

use Alevel\Orders\Model\OrdersFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\DB\TransactionFactory;

class AddStatus implements DataPatchInterface
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
        $arrStatus = ['pending','open','closed'];
        foreach ($arrStatus as $item) {
            $modelStatus = $this->modelStatusFactory->create();
            $modelStatus->setLabel($item);
            $transaction->addObject($modelStatus);
        }
          $transaction->save();
    }

}

