<?php

namespace Test2\Developer\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

class Save extends Action
{
    protected $resultPageFactory;
    protected $devFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Test2\Developer\Model\DevFactory $devFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->devFactory = $devFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            try {
                $id = $data['id'];
                $vendor = $this->devFactory->create()->load($id);
                $data = array_filter($data, function ($value) {
                    return $value !== '';
                });

                $vendor->setData($data);
                $this->_eventManager->dispatch('save_vendor', ['dev' => $vendor]);
                $vendor->save();
                $this->messageManager->addSuccess(__('Successfully saved the Vendor'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('dev/index/vendor');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/*/');
            }
        }

        return $resultRedirect->setPath('*/*/');
    }
}