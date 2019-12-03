<?php

namespace Test3\Hotel\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class NewHotel extends Action
{
    protected $_resultFactory;

   public function __construct(Action\Context $context, PageFactory $resultFactory)
   {
       $this->_resultFactory = $resultFactory;
       parent::__construct($context);
   }

    public function execute()
    {
        $resultPage = $this->_resultFactory->create();
        return $resultPage;

    }
}