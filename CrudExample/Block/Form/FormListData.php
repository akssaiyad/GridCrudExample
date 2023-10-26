<?php

namespace Aks\CrudExample\Block\Form;

use Magento\Framework\View\Element\Template\Context;
use Aks\CrudExample\Model\FormFactory;
/**
 * FormListData List block
 */
class FormListData extends \Magento\Framework\View\Element\Template
{
    /**
     * @var FormFactory
     */
    protected $formFactory;
    public function __construct(
        Context $context,
        FormFactory $formFactory
    ) {
        $this->formFactory = $formFactory;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Crud Example Form Module List Page'));
        
        if ($this->getFormCollection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'aks.form.pager'
            )->setAvailableLimit(array(5=>5,10=>10,15=>15))->setShowPerPage(true)->setCollection(
                $this->getFormCollection()
            );
            $this->setChild('pager', $pager);
            $this->getFormCollection()->load();
        }
        return parent::_prepareLayout();
    }

    public function getFormCollection()
    {
        $page = ($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 5;

        $form = $this->formFactory->create();
        $collection = $form->getCollection();
        $collection->addFieldToFilter('status','1');
        //$form->setOrder('form_id','ASC');
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);

        return $collection;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}