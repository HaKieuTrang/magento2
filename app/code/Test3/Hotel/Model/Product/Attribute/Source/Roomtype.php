<?php


namespace Test3\Hotel\Model\Product\Attribute\Source;


class Roomtype extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = [
                ['label' => __('Please Select Room Type'), 'value' => null],
                ['label' => __('Single'), 'value' => 'single'],
                ['label' => __('Double'), 'value' => 'double'],
                ['label' => __('Triple'), 'value' => 'triple'],
            ];
        }
        return $this->_options;
    }
}
