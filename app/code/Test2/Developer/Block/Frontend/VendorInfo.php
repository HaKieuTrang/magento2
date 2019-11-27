<?php


namespace Test2\Developer\Block\Frontend;

use Magento\Customer\Api\Data\CustomerInterfaceFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template;

class VendorInfo extends Template
{
    protected $_url;
    protected $_customerFactory;

    public function __construct(
        Template\Context $context,
        array $data = [],
        UrlInterface $url)
    {
        $this->_url = $url;
        parent::__construct($context, $data);
    }

    public function getUrlInfo()
    {
        $url = $this->_url->getUrl('vendorinfo/index/getinfo');
        return $url;
    }


}