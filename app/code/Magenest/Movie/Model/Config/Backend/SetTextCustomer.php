<?php

namespace Magenest\Movie\Model\Config\Backend;

use Magento\Framework\App\Config\Value;

class SetTextCustomer extends Value
{
    public function beforeSave()
    {
        $value = $this->getValue();
        if ($value == 'Ping') {
            $this->setValue('Pong');
        } else {
            $this->setValue('Hihi');
        }
        return parent::beforeSave();
    }
}