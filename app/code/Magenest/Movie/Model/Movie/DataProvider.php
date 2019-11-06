<?php

namespace Magenest\Movie\Model\Movie;

use Magenest\Movie\Model\ResourceModel\MagenestMovie\CollectionFactory;
use Magenest\Movie\Model\MagenestMovie;
use Magento\Ui\DataProvider\AbstractDataProvider;

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

        return [];
    }

}