<?php


namespace Magenest\Movie\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class AddActor extends Action
{
    protected $resultPageFactory;

    public function __construct(Action\Context $context, PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(_('Add New Actor'));
        return $resultPage;
    }
}