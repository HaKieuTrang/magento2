<?php

namespace Test3\Hotel\Block\FrontEnd;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\View\Element\Template;
use Test3\Hotel\Model\ResourceModel\Hotel\CollectionFactory;
use Magento\Framework\Registry;

class SelectHotel extends Template
{
    protected $_hotelCollection;
    protected $_registry;

    public function __construct(
        Template\Context $context,
        array $data = [],
        CollectionFactory $hotelCollection,
        Registry $registry)
    {
        parent::__construct($context, $data);
        $this->_hotelCollection = $hotelCollection;
        $this->_registry = $registry;
    }

    public function getInfo()
    {
        $collection = $this->_hotelCollection->create()->getData();
        return $collection;
    }

    public function getCurrentProduct()
    {
        return $this->_registry->registry('current_product');
    }
}