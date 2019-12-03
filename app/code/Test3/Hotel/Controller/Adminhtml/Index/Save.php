<?php

namespace Test3\Hotel\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

class Save extends Action
{
    protected $resultPageFactory;
    protected $_hotelFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Test3\Hotel\Model\HotelFactory $hotelFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->_hotelFactory = $hotelFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            try {
                $id = $data['hotel_id'];
                $hotel = $this->_hotelFactory->create()->load($id);
                $data = array_filter($data, function ($value) {
                    return $value !== '';
                });

                $hotel->setData($data);
                $this->_eventManager->dispatch('save_vendor', ['hotel' => $hotel]);
                $hotel->save();
                $this->messageManager->addSuccess(__('Successfully saved the Hotel'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('hotel/index/index');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/*/');
            }
        }

        return $resultRedirect->setPath('*/*/');
    }

}