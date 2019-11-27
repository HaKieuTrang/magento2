<?php

namespace Test2\Developer\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Controller\Result\JsonFactory;

class GetInfo extends Action
{
    protected $_customerRepository;
    protected $_resultJsonFactory;

    public function __construct(
        Context $context,
        CustomerRepositoryInterface $customerRepository,
        JsonFactory $resultJsonFactory)
    {
        $this->_customerRepository = $customerRepository;
        $this->_resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $customerID = $data['id'];
        $customer = $this->_customerRepository->getById($customerID);
        $info = [
            'id' => $customer->getId(),
            'name' => $customer->getFirstname(). ' '. $customer->getLastname(),
            'email' => $customer->getEmail(),
            'address' => $customer->getAddresses()[0]->getCity()
        ];
        $result = $this->_resultJsonFactory->create()->setData($info);
        return $result;
    }
}