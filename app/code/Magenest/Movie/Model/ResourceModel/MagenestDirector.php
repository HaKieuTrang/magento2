<?php

namespace Magenest\Movie\Model\ResourceModel;
class MagenestDirector extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('magenest_director', 'director_id');
    }
}