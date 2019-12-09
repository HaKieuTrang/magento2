<?php

namespace Test3\Hotel\Block\Adminhtml;

use Magento\Sales\Model\ResourceModel\Order\CollectionFactory as OrderCollection;
use Magento\Sales\Model\OrderFactory;
use Magento\Catalog\Model\ProductFactory;

use Magento\Framework\View\Element\Template;

class HotelOrder extends Template
{
    protected $_orderCollection;
    protected $_orderFactory;
    protected $_productFactory;

    public function __construct(
        Template\Context $context,
        array $data = [],
        OrderCollection $orderCollection,
        OrderFactory $orderFactory,
        ProductFactory $productFactory)
    {
        $this->_orderCollection = $orderCollection;
        $this->_orderFactory = $orderFactory;
        $this->_productFactory = $productFactory;
        parent::__construct($context, $data);
    }

    public function getOrder()
    {
        $order = $this->_orderCollection->create()->addAttributeToSelect('*')->getData();
        return $order;
    }

    public function getProduct($order_id)
    {
        $order = $this->_orderFactory->create()->load($order_id);
        $items = $order->getAllVisibleItems();
        foreach ($items as $item) {
            $product_id = $item->getProductId();
            $product  =  $this->_productFactory->create()->load($product_id);
            return $product;
        }
    }

}