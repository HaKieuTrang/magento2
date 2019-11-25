<?php

namespace Test2\Developer\Observer;

use Magento\Customer\Model\CustomerFactory;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Test2\Developer\Model\DevFactory;

class SetApprovedCustomer implements ObserverInterface
{
    protected $_customerFactory;
    protected $_customerRepositoryInterface;
    protected $_vendor;
    protected $_request;

    public function __construct(
        CustomerFactory $customerFactory,
        CustomerRepositoryInterface $customerRepositoryInterface,
        DevFactory $vendor,
        \Magento\Framework\App\Request\Http $request)
    {
        $this->_customerFactory = $customerFactory;
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
        $this->_vendor = $vendor;
        $this->_request = $request;
    }

    public function execute(Observer $observer)
    {
//        $vendor_id =  $this->_request->getParam('id');
//        if ($vendor_id) {
//            $customer_id = $this->_vendor->create()->load($vendor_id)->getCustomerId();
//            $customer = $this->_customerFactory->create()->load($customer_id)->getDataModel();
//            $customer->setCustomAttribute('dev_is_approved', '1');
//            $this->_customerRepositoryInterface->save($customer);
//        } else {
//            return;
//        }
        $customer_id = $_POST['customer_id'];
        $customer = $this->_customerFactory->create()->load($customer_id)->getDataModel();
        $customer->setCustomAttribute('dev_is_approved', '1');
        $this->_customerRepositoryInterface->save($customer);


    }

}