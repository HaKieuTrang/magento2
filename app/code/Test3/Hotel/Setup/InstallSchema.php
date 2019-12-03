<?php

namespace Test3\Hotel\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $table = $setup->getConnection()->newTable($setup->getTable('test3_hotel'))
            ->addColumn('hotel_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'ID')
            ->addColumn('hotel_name',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                100,
                ['nullable' => false],
                'Hotel Name')
            ->addColumn('location_street',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Street')
            ->addColumn('location_city',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                50,
                ['nullable' => false],
                'City')
            ->addColumn('location_state',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                50,
                ['nullable' => false],
                'State')
            ->addColumn('location_country',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                10,
                ['nullable' => false],
                'Country')
            ->addColumn('contact_phone',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                20,
                ['nullable' => false],
                'Phone Number')
            ->addColumn('total_available_room',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Total Available Room'
            )->addColumn('available_single',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Available Single'
            )->addColumn('available_double',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Available Double'
            )->addColumn('available_triple',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Available Triple'
            );
        $setup->getConnection()->createTable($table);
        $setup->endSetup();
    }
}