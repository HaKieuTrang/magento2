<?php

namespace Test2\Developer\Observer;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Test2\Developer\Model\DevFactory;

class SetVendorSignUp implements ObserverInterface
{
    protected $_customerRepository;
    protected $_devFactory;

    public function __construct(
        CustomerRepositoryInterface $customerRepository,
        DevFactory $devFactory)
    {
        $this->_customerRepository = $customerRepository;
        $this->_devFactory = $devFactory;
    }

    public function execute(Observer $observer)
    {
        $customer = $observer->getEvent()->getData('customer');
        if (isset($_REQUEST['dev_is_approved']) && $_REQUEST['dev_is_approved'] == 'on' ) {
            $vendor = 1;
        } else {
            $vendor = 0;
        }
        $customer->setCustomAttribute('dev_is_approved', $vendor);
        $this->_customerRepository->save($customer);
        if ($vendor == 1) {
            $data = [
                'customer_id' => $customer->getId(),
                'first_name' => $_REQUEST['firstname'],
                'last_name' => $_REQUEST['lastname'],
                'email' => $_REQUEST['email']
            ];
            $this->_devFactory->create()->setData($data)->save();
        }
    }
}