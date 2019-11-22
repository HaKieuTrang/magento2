<?php

namespace Test2\Developer\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $table = $setup->getConnection()->newTable($setup->getTable('test_dev'))
            ->addColumn('id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                11,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'ID')
            ->addColumn('customer_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                11,
                ['nullable' => false],
                'Customer Id')
            ->addColumn('first_name',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                '255',
                ['nullable' => false],
                'First Name')
            ->addColumn('last_name',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Last Name')
            ->addColumn('email',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'Email')
            ->addColumn('company',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => false],
                'Company')
            ->addColumn('phone_number',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                15,
                ['nullable' => false],
                'Phone Number')
            ->addColumn('fax',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                20,
                ['nullable' => false],
                'Fax'
            )->addColumn('address',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => false],
                'Address'
            )->addColumn('street',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => false],
                'Street'
            )->addColumn('country',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                null,
                ['nullable' => false],
                'Country'
            )->addColumn('city',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                50,
                ['nullable' => false],
                'City'
            )->addColumn('postcode',
                \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                20,
                ['nullable' => false],
                'Postcode'
            )->addColumn('total_sales',
                \Magento\Framework\Db\Ddl\Table::TYPE_FLOAT,
                11,
                ['nullable' => false],
                'Total Sales'
            );
        $setup->getConnection()->createTable($table);
        $setup->endSetup();
    }
}