<?php

namespace Magenest\CustomerAttribute\Block;

use Magento\Customer\Helper\Session\CurrentCustomer;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;

class DisplayCustomer extends Template
{
    private $_customer;
    private $_customerRepositoryInterface;
    protected $_storeManager;

    public function __construct(
        Template\Context $context,
        CurrentCustomer $customer,
        CustomerRepositoryInterface $customerRepositoryInterface,
        StoreManagerInterface $storeManager,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->_customer= $customer;
        $this->_storeManager= $storeManager;
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function getCustomerInfo()
    {
        return $this->_customer->getCustomer();
    }

    public function getBaseUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl();
    }


    public function getAvatarUrl($customerId)
    {
        $baseUrl = $this->getBaseUrl();
        $avatar = $this->_customerRepositoryInterface->getById($customerId)->getCustomAttribute('avatar')->getValue();
        $url = $baseUrl.'pub/media/customer'.$avatar;
        return $url;
    }
}