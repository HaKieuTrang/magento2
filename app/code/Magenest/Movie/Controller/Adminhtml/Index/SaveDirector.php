<?php

namespace Magenest\Movie\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

class SaveDirector extends Action
{
    protected $resultPageFactory;
    protected $directorFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magenest\Movie\Model\MagenestDirectorFactory $directorFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->directorFactory = $directorFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if($data)
        {
            try{
                $director= $this->directorFactory->create();
                $data = array_filter($data, function($value) {return $value !== ''; });

                $director->setName($this->getRequest()->getPostValue()['adddirector']['name']);

                $this->_eventManager->dispatch('save_director', ['director' => $director]);
                $director->save();
                $this->messageManager->addSuccess(__('Successfully saved the movie.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('movie/index/director');
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