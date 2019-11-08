<?php

namespace Magenest\Movie\Block;

use Magenest\Movie\Model\ResourceModel\MagenestMovie\CollectionFactory;
use Magenest\Movie\Model\ResourceModel\MagenestActor\CollectionFactory as ActorCollectionFactory;
use Magento\Framework\View\Element\Template;

class Display extends Template
{
    protected $_movieCollection;
    protected $_actorCollection;

    public function __construct(
        Template\Context $context,
        CollectionFactory $movieCollection,
        ActorCollectionFactory $actorCollection,
        array $data = []
    )
    {
        $this->_movieCollection = $movieCollection;
        $this->_actorCollection = $actorCollection;
        parent::__construct($context, $data);
    }

    public function getInfo()
    {
        $movie = $this->_movieCollection->create();
        $movie->getSelect()
            ->joinLeft(
                [
                    'magenest_director' => $movie->getTable('magenest_director')
                ],
                'main_table.director_id = magenest_director.director_id',
               ['directorname' => 'magenest_director.name']);
//            ->joinLeft(
//                [
//                    'magenest_movie_actor' => $movie->getTable('magenest_movie_actor')
//                ],
//                'main_table.movie_id = magenest_movie_actor.movie_id',
//                ['actor_id' => 'magenest_movie_actor.actor_id']
//            );

        return $movie;
    }

    public function getMovie(){
       return $this->_movieCollection->create();

    }

    public function getActor(){
        $actor = $this->_actorCollection->create()->addFieldToSelect('name');
        return $actor;
    }

    public function movieRows(){
        $movieRows = $this->getMovie()->count();
        return $movieRows;
     }

}