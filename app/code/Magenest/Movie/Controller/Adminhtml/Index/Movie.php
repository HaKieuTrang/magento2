<?php

namespace Magenest\Movie\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Movie extends Action
{
    protected $resultFactory;

    public function __construct(Action\Context $context, PageFactory $resultFactory)
    {
        parent::__construct($context);
        $this->resultFactory = $resultFactory;
    }
    public function execute()
    {
        $resultPage = $this->resultFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Movie')));

        return $resultPage;
    }
}