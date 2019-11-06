<?php

namespace Magenest\Movie\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

class Save extends Action
{
    protected $resultPageFactory;
    protected $movieFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magenest\Movie\Model\MagenestMovieFactory $movieFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->movieFactory = $movieFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if($data)
        {
            try{
                $movie = $this->movieFactory->create();
                $data = array_filter($data, function($value) {return $value !== ''; });

                $movie->setName($this->getRequest()->getPostValue()['addmovie']['name']);
                $movie->setDescription($this->getRequest()->getPostValue()['addmovie']['description']);
                $movie->setRating($this->getRequest()->getPostValue()['addmovie']['rating']);
                $movie->setDirectorId($this->getRequest()->getPostValue()['addmovie']['director_id']);

                // $movie->setData($data);
                $this->_eventManager->dispatch('save_movie', ['movie' => $movie]);
                $movie->save();
                $this->messageManager->addSuccess(__('Successfully saved the movie.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('movie/index/movie');
            }
            catch(\Exception $e)
            {
                $this->messageManager->addError($e->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/*/');
            }
        }

        return $resultRedirect->setPath('*/*/');
    }
}