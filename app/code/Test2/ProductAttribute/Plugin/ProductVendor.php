<?php

namespace Test2\ProductAttribute\Plugin;

use Magento\Sales\Model\OrderFactory;
use Magento\Catalog\Model\ProductFactory;
use Test2\Developer\Model\DevFactory as VendorFactory;

class ProductVendor
{
    protected $_orderFactory;
    protected $_productFactory;
    protected $_vendorFactory;

    public function __construct(
        OrderFactory $orderFactory,
        ProductFactory $productFactory,
        VendorFactory $vendorFactory)
    {
        $this->_orderFactory = $orderFactory;
        $this->_productFactory = $productFactory;
        $this->_vendorFactory = $vendorFactory;
    }

    public function afterSetState(\Magento\Sales\Model\Order $subject, $state)
    {
        $orderId = $state->getEntityId();
        $order = $this->_orderFactory->create()->load($orderId)->getAllItems();

        foreach ($order as $item) {
            $productId = $item->getProductId();
            $productVendorId = $this->_productFactory->create()->load($productId)
                ->getDataByKey('dev_product_vendor');
            $vendor = $this->_vendorFactory->create()->load($productVendorId);
            $vendorSales = $vendor->getDataByKey('total_sales');
            if ($state->getState() == 'processing') {
                $vendorTotalSales = $vendorSales + $item->getQtyOrdered();
                $vendor->setTotalSales($vendorTotalSales)->save();
            }
        }
        return $subject;
    }
}