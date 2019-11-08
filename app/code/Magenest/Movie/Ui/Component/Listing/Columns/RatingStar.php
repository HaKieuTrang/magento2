<?php

namespace Magenest\Movie\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class RatingStar extends Column
{
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = [])
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {

            // key: name -> cột rating
            $fieldName = $this->getData('name'); //$fieldName:'rating'

            foreach ($dataSource['data']['items'] as & $item) {
                $rating = $item[$fieldName];
                $item[$fieldName] = html_entity_decode($this->getHtml($rating)); // giá trị muốn hiển thị trong bảng
            }
        }

        return $dataSource;
    }

    public function getHtml($rating)
    {
        $result = '';
        for ($i = 0; $i < $rating; $i++)
             $result = $result.'<span style="font-size: 300%;">&starf;</span>';
        for ($i = 0; $i < 5 - $rating; $i++)
            $result = $result. '<span style="font-size: 300%;">&star;</span>';
        return $result;
    }
}
