<?php


namespace Test2\Developer\Ui\Component\Form;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Customer\Model\ResourceModel\Customer\CollectionFactory;

class SelectCustomer implements OptionSourceInterface
{
    protected $_customer;
    public function __construct(CollectionFactory $customerCollection)
    {
        $this->_customer = $customerCollection;
    }

    public function toOptionArray()
    {
        $collection = $this->_customer->create()->getData();
        foreach ($collection as $customer) {
            $id = $customer['entity_id'];
            if (!isset($customerById[$id])) {
                $customerById[$id] = [
                    'value' => $id
                ];
            }
            $customerById[$id]['label'] = $customer['firstname']." ".$customer['lastname'];
          //  $customerById[$id]['label'] = $id;
        }
        return $customerById;
    }
}