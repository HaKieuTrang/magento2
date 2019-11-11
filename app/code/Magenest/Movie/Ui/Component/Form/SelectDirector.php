<?php

namespace Magenest\Movie\Ui\Component\Form;

use Magento\Framework\Data\OptionSourceInterface;
use Magenest\Movie\Model\ResourceModel\MagenestDirector\CollectionFactory as DirectorCollectionFactory;
use Magento\Framework\App\RequestInterface;

class SelectDirector implements OptionSourceInterface
{
    protected $directorCollectionFactory;
    protected $request;
    protected $directorTree;

    public function __construct(
        DirectorCollectionFactory $directorCollectionFactory,
        RequestInterface $request)
    {
        $this->directorCollectionFactory = $directorCollectionFactory;
        $this->request = $request;
    }

    public function toOptionArray()
    {
        if ($this->directorTree == null) {
            $collection = $this->directorCollectionFactory->create();

            $collection->getData();

            foreach ($collection as $director) {
                $directorId = $director['director_id'];
                if (!isset($directorById[$directorId])) {
                    $directorById[$directorId] = [
                        'value' => $directorId
                    ];
                }
                $directorById[$directorId]['label'] = $director['name'];
            }

        }
        return $directorById;
    }
    
}