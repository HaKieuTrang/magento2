<?php

namespace Magenest\Movie\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class AddDirector extends Action
{
    protected $resultPageFactory;

    public function __construct(Action\Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {
       $resultPage = $this->resultPageFactory->create();
       $resultPage->getConfig()->getTitle()->prepend(_('Add New Director'));
       return $resultPage;
    }
}