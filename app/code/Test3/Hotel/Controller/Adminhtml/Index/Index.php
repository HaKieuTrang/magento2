<?php

namespace Test3\Hotel\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $_resultFactory;

    public function __construct(Context $context, PageFactory $resultFactory)
    {
        $this->_resultFactory = $resultFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_resultFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(_('Hotel'));
        return $resultPage;
    }
}