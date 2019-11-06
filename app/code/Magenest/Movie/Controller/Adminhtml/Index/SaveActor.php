<?php

namespace Magenest\Movie\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

class SaveActor extends Action
{
    protected $resultPageFactory;
    protected $actorFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magenest\Movie\Model\MagenestActorFactory $actorFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->actorFactory = $actorFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if($data)
        {
            try{
                $actor = $this->actorFactory->create();
                $data = array_filter($data, function($value) {return $value !== ''; });

                $actor->setName($this->getRequest()->getPostValue()['addactor']['name']);
    
                $this->_eventManager->dispatch('save_actor', ['actor' => $actor]);
                $actor->save();
                $this->messageManager->addSuccess(__('Successfully saved the actor.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('movie/index/actor');
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