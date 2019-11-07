<?php

namespace Magenest\CustomerAttribute\Block;

use Magento\Customer\Model\ResourceModel\Customer\CollectionFactory;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;

class DisplayCustomer extends Template
{
    private $_customerFactory;
    private $_customerRepositoryInterface;
    protected $_storeManager;

    public function __construct(
        Template\Context $context,
        CollectionFactory $customerFactory,
        CustomerRepositoryInterface $customerRepositoryInterface,
        StoreManagerInterface $storeManager,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->_customerFactory = $customerFactory;
        $this->_storeManager= $storeManager;
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function getCustomerCollection()
    {
        return $this->_customerFactory->create();
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