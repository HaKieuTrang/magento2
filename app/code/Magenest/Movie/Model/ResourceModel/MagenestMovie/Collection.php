<?php

namespace Magenest\Movie\Model\ResourceModel\MagenestMovie;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
   protected function _construct()
   {
      $this->_init(
          'Magenest\Movie\Model\MagenestMovie',
          'Magenest\Movie\Model\ResourceModel\MagenestMovie');
   }

}