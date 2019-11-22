<?php

namespace Test2\Developer\Model\ResourceModel\Dev;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Test2\Developer\Model\Dev',
            'Test2\Developer\Model\ResourceModel\Dev');
    }
}