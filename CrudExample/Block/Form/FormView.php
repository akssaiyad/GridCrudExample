<?php

namespace Aks\CrudExample\Block\Form;

use Magento\Framework\View\Element\Template\Context;
use Aks\CrudExample\Model\FormFactory;
use Magento\Cms\Model\Template\FilterProvider;
/**
 * Form View block
 */
class FormView extends \Magento\Framework\View\Element\Template
{
    /**
     * @var FormFactory
     */
    protected $formFactory;
    public function __construct(
        Context $context,
        FormFactory $formFactory,
        FilterProvider $filterProvider
    ) {
        $this->formFactory = $formFactory;
        $this->_filterProvider = $filterProvider;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Crud Example Form Module View Page'));
        
        return parent::_prepareLayout();
    }

    public function getSingleData()
    {
        $id = $this->getRequest()->getParam('crud_id');
        $form = $this->formFactory->create();
        $singleData = $form->load($id);
        if($singleData->getCrudId() && $singleData->getStatus() == 1){
            return $singleData;
        }else{
            return false;
        }
    }
}