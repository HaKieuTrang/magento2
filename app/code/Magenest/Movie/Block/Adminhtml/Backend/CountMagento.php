<?php

namespace Magenest\Movie\Block\Adminhtml\Backend;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Module\ModuleList;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;
use Magento\Customer\Model\ResourceModel\Customer\CollectionFactory as CustomerCollectionFactory;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory as OrderCollectionFactory;
use Magento\Sales\Model\ResourceModel\Order\Invoice\CollectionFactory as InvoiceCollectionFactory;
use Magento\Sales\Model\ResourceModel\Order\Creditmemo\CollectionFactory as CreditMemoCollectionFactory;


class CountMagento extends Template
{
    protected $_productCollection;
    protected $_customerColection;
    protected $_orderCollection;
    protected $_invoiceCollection;
    protected $_creditMemo;
    protected $_moduleList;

    public function __construct(
        Template\Context $context,
        array $data = [],
        ProductCollectionFactory $productCollection,
        CustomerCollectionFactory $customerCollection,
        OrderCollectionFactory $orderCollection,
        InvoiceCollectionFactory $invoiceCollection,
        CreditMemoCollectionFactory $creditMemo,
        ModuleList $moduleList)
    {
        $this->_productCollection = $productCollection;
        $this->_customerColection = $customerCollection;
        $this->_orderCollection = $orderCollection;
        $this->_invoiceCollection = $invoiceCollection;
        $this->_creditMemo = $creditMemo;
        $this->_moduleList = $moduleList;
        parent::__construct($context, $data);
    }

    public function countProduct()
    {
        return $this->_productCollection->create()->count();

    }

    public function countCustomer()
    {
        return $this->_customerColection->create()->count();
    }

    public function countOrder()
    {
        return $this->_orderCollection->create()->count();
    }

    public function countInvoice()
    {
        return $this->_invoiceCollection->create()->count();
    }

    public function countCreditMemo(){
        return $this->_creditMemo->create()->count();
    }
    public function countModule(){
        $module = $this->_moduleList->getAll();
        return count($module);
    }
}