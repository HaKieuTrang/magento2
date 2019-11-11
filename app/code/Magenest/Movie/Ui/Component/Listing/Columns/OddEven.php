<?php

namespace Magenest\Movie\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class OddEven extends Column
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

            $fieldName = $this->getData('name');

            foreach ($dataSource['data']['items'] as & $item) {
                $id = $item['entity_id'];
                $item[$fieldName] = html_entity_decode($this->getHtml($id)); // giá trị muốn hiển thị trong bảng
            }
        }

        return $dataSource;
    }

    function getHtml($id)
    {
        $class = '';
        if ($id % 2 == 0){
            $class = 'grid-severity-notice';
            $value = 'Odd';
        }

        else {
            $class = 'grid-severity-critical';
            $value = 'Even';
        }
        return '<span class="' . $class . '"><span>' . $value. '</span> </span>';
    }


}