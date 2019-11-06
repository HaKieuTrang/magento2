<?php

namespace Magenest\CustomerAttribute\Model\Attribute\Backend;

use Magento\Catalog\Model\Category\Attribute\Backend\Image;
use Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend;
use Magento\Framework\App\Request\Http;
use Magento\Framework\Filesystem;
use Magento\Framework\Filesystem\DirectoryList;
use Magento\Framework\ObjectManagerInterface;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Psr\Log\LoggerInterface;


class Avatar extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
    public function beforeSave($object)
    {
        return AbstractBackend::beforeSave($object);
    }
}