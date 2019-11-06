<?php

namespace Magenest\Movie\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class SetMovieRating implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $observer->getEvent()->getMovie()->setRating('0')->save();
    }

}