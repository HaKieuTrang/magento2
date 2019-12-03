<?php


namespace Test3\Hotel\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Test3\Hotel\Model\HotelFactory;
use Magento\Framework\App\ResponseInterface;

class Delete extends Action
{
    protected $_hotelFactory;

    public function __construct(Context $context, HotelFactory $hotelFactory)
    {
        parent::__construct($context);
        $this->_hotelFactory = $hotelFactory;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $hotel = $this->_hotelFactory->create()->load($id);
        $hotel->delete();
        $this->messageManager->addSuccess(__('Successfully deleted the Hotel'));
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('hotel/index/index');
    }
}