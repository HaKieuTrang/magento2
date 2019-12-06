<?php

namespace Test3\Hotel\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class OrderAfter implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $statuscode = $observer->getEvent()->getOrder()->getStatus();
        $statuslabel = $observer->getEvent()->getOrder()->getStatusLabel();

    }
}