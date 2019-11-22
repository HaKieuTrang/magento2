<?php

namespace Test2\Developer\Model\Vendor;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Test2\Developer\Model\ResourceModel\Dev\CollectionFactory;

class DataProvider extends AbstractDataProvider
{
    protected $collection;
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        array $meta = [],
        array $data = [],
        CollectionFactory $collectionFactory)
    {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }

        $items = $this->collection->getItems();
        $this->_loadedData = array();
        foreach ($items as $vendor) {
            $this->_loadedData[$vendor->getId()] = $vendor->getData();
        }
        return $this->_loadedData;
    }
}