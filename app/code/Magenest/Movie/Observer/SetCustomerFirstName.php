<?php

namespace Magenest\Movie\Observer;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class SetCustomerFirstName implements ObserverInterface
{
    protected $_customerRepository;

    public function __construct(
        CustomerRepositoryInterface $customerRepository)
    {
        $this->_customerRepository = $customerRepository;
    }

    public function execute(Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer()->setFirstname('Magenest');
        $this->_customerRepository->save($customer);
    }

}