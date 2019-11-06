<?php

namespace Magenest\Movie\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magenest\Movie\Model\MagenestActorFactory;
use Magenest\Movie\Model\MagenestDirectorFactory;
use Magenest\Movie\Model\MagenestMovieFactory;

class Collection extends Action
{

    protected $_actorFactory;
    protected $_directorFactory;
    protected $_movieFactory;

    public function __construct(
        Context $context,
        MagenestActorFactory $actorFactory,
        MagenestDirectorFactory $directorFactory,
        MagenestMovieFactory $movieFactory
    )
    {
        $this->_actorFactory = $actorFactory;
        $this->_directorFactory = $directorFactory;
        $this->_movieFactory = $movieFactory;
        parent::__construct($context);
    }

    public
    function execute()
    {
        $actor = $this->_actorFactory->create()->getCollection()->addFieldToSelect('name');
        foreach ($actor as $item) {
            echo $item['name'] . "<br>";
        }
        $director = $this->_directorFactory->create()->getCollection()->getData();
        foreach ($director as $item) {
            echo $item['director_id'] . ". " . $item['name'] . "<br>";
        }
//        $movie = $this->_directorFactory->create()->getCollection()->getSelect()
//            ->joinInner(['magenest_director'],
//                'magenest_movie.director_id = magenest_director.director_id', ['director_name'=>'name']);

    }
}