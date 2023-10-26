<?php

namespace Aks\CrudExample\Controller\Form;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\NotFoundException;
use Aks\CrudExample\Block\Form\FormView;

class View extends \Magento\Framework\App\Action\Action
{
	protected $formView;

	public function __construct(
        Context $context,
        FormView $formView
    ) {
        $this->formView = $formView;
        parent::__construct($context);
    }

	public function execute()
    {
    	if(!$this->formView->getSingleData()){
    		throw new NotFoundException(__('Parameter is incorrect.'));
    	}
    	
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
    }
}
