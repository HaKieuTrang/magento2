<?php

namespace Test3\Hotel\Model\ResourceModel\Hotel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Test3\Hotel\Model\Hotel',
            'Test3\Hotel\Model\ResourceModel\Hotel');
    }
}