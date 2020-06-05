<?php


namespace Alevel\Orders\Setup\Patch\Schema;

use Magento\Framework\Setup\Patch\PatchInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class DropCol implements SchemaPatchInterface
{
    /** @var SchemaSetupInterface */
    private $setup;

    public function __construct(SchemaSetupInterface $setup)
    {
        $this->setup = $setup;
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
        $this->setup->startSetup();

        $this->setup
            ->getConnection()
            ->dropColumn(
                $this->setup->getTable('level_quick_order'), 'date'
            );

        $this->setup->endSetup();
    }
}
