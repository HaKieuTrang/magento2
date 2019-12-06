<?php


namespace Test3\Hotel\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Test3\Hotel\Model\ResourceModel\Hotel\CollectionFactory as HotelCollection;

class SetProductId implements ObserverInterface
{

    protected $_hotelCollection;

    public function __construct(HotelCollection $hotelCollection)
    {
        $this->_hotelCollection = $hotelCollection;
    }

    public function execute(Observer $observer)
    {
        $item = $observer->getEvent()->getProduct();
        $roomtype = $item->getRoomtype();
        $hotel = $_POST['hotel'];
        // xem so luong san pham trong gio hang
//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//        $cart = $objectManager->get('\Magento\Checkout\Model\Cart');
//        $totalItems = $cart->getQuote()->getItemsCount();
//        $totalQuantity = $cart->getQuote()->getItemsQty();

        if (isset($roomtype)) {
            if (empty($hotel)) {
                $item->setEntityId(0)->save(); // set product id la 0
            }
        }
    }
}