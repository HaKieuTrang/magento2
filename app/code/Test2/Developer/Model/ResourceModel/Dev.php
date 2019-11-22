<?php

namespace Test2\Developer\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Dev extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('test_dev', 'id');
    }
}