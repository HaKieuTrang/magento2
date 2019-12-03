<?php

namespace Test2\ProductAttribute\Model\Product\Attribute\Source;

use Test2\Developer\Model\ResourceModel\Dev\CollectionFactory;

class ProductVendor extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    protected $_vendorCollection;

    public function __construct(CollectionFactory $vendorCollection)
    {
        $this->_vendorCollection = $vendorCollection;
    }

    public function getAllOptions()
    {
        $options = [];
        foreach ($this->getVendor() as $index => $value) {
            $options[] = ['value' => $index, 'label' => $value];
        }
        return $options;


    }

    public function getVendor()
    {
        $collection = $this->_vendorCollection->create()->getData();
        $vendorData = [];
        foreach ($collection as $vendor) {
            $id = $vendor['id'];
            $name = $vendor['first_name'].' '.$vendor['last_name'];
            $vendorData[$id] = $name;
        }
        return $vendorData;

    }

}