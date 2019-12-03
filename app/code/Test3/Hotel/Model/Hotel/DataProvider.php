<?php

namespace Test3\Hotel\Model\Hotel;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Test3\Hotel\Model\ResourceModel\Hotel\CollectionFactory;

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