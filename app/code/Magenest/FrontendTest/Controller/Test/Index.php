<?php

namespace Magenest\FrontendTest\Controller\Test;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $resultFactory;
    public function __construct(Context $context, PageFactory $resultFactory)
    {
        parent::__construct($context);
        $this->resultFactory = $resultFactory;
    }

    public function execute()
    {
       $resultPage = $this->resultFactory->create();
       return $resultPage;
    }
}