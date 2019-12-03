<?php

namespace Test3\Hotel\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Hotel extends AbstractDb
{

    protected function _construct()
    {
       $this->_init('test3_hotel','hotel_id');
    }
}