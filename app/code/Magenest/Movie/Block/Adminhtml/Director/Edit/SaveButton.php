<?php

namespace Magenest\Movie\Block\Adminhtml\Director\Edit;

use Magento\Cms\Block\Adminhtml\Page\Edit\GenericButton;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface
{

    public function getButtonData()
    {
       return [
           'label' => _('Save'),
           'class' => 'save primary',
           'data_attribute' => [
               'mage-init'=>['button' => ['event' => 'save']],
               'form-role' => 'save'
           ],
           'on_click' => sprintf("location.href= '%s';", $this->getSaveUrl()),
           'sort_order' => 90
       ];
    }
    public function getSaveURL(){
        return $this->getUrl('*/*/savedirector', []);
    }
}