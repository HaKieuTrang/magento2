<?php

namespace Test2\Developer\Setup;

use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class InstallData implements InstallDataInterface

{
    private $_customerSetupFactory;

    public function __construct(CustomerSetupFactory $customerSetupFactory)
    {
        $this->_customerSetupFactory = $customerSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $customerSetup = $this->_customerSetupFactory->create(['setup' => $setup]);
        $setup->startSetup();
        $customerSetup->addAttribute('customer', 'dev_is_approved', [
            'label' => 'Dev is approved',
            'type' => 'static',
            'input' => 'text',
            'source' => '',
            'backend' => '',
            'required' => false,
            'visible' => true,
            'position' => 105,
            'is_used_in_grid' => true,
            'is_visible_in_grid' => true,
            'is_filterable_in_grid' => true
        ]);
        $devIsAppoved = $customerSetup->getEavConfig()->getAttribute('customer', 'dev_is_approved');
        $devIsAppoved->setData('used_in_forms', ['adminhtml_customer']);
        $devIsAppoved->save();
        $setup->endSetup();
    }
}