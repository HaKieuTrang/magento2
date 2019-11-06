<?php

namespace Magenest\Movie\Plugin;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Helper\ImageFactory;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\App\ObjectManager;

class Product
{
    protected $objectManager;
    protected $imageFactory;
    protected $productFactory;
    protected $productRepository;

    public function __construct(
        ImageFactory $imageFactory,
        ProductFactory $productFactory,
        ProductRepositoryInterface
        $productRepository)
    {
        $this->objectManager = ObjectManager::getInstance();
        $this->imageFactory = $imageFactory;
        $this->productFactory = $productFactory;
        $this->productRepository = $productRepository;
    }

    public function aroundGetItemData($subject, $proceed, $item) {
        $result = $proceed($item);
        $sku = $result['product_sku'];
        $product = $this->productRepository->get($sku);
        $productImageUrl = $this->imageFactory->create()->init($product, 'product_thumbnail_image')->getUrl();
        $result['product_image']['src'] = $productImageUrl;
        $result['product_name'] = $product->getName();
        return $result;
    }
}