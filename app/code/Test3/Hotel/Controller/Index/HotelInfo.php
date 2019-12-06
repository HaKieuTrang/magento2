<?php


namespace Test3\Hotel\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Test3\Hotel\Model\HotelFactory;
use Magento\Framework\Controller\Result\JsonFactory;

class HotelInfo extends Action
{
    protected $_hotelFactory;
    protected $_jsonFactory;

    public function __construct(
        Context $context,
        HotelFactory $hotelFactory,
        JsonFactory $jsonFactory)
    {
        parent::__construct($context);
        $this->_hotelFactory = $hotelFactory;
        $this->_jsonFactory = $jsonFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $hotelId = $data['hotel'];
        if (empty($hotelId)) {
            return;
        }
        $hotelInfo = $this->_hotelFactory->create()->load($hotelId);
        $info = [
            'id' => $hotelInfo->getHotelId(),
            'name' => $hotelInfo->getHotelName(),
            'city' => $hotelInfo->getLocationCity(),
            'phone' => $hotelInfo->getContactPhone(),
             'single' => $hotelInfo->getAvailableSingle(),
             'double' => $hotelInfo->getAvailableDouble(),
             'triple' => $hotelInfo->getAvailableTriple(),
        ];
        $result = $this->_jsonFactory->create()->setData($info);
        return $result;
    }
}