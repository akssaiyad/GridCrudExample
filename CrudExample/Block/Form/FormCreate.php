<?php

namespace Aks\CrudExample\Block\Form;

/**
 * FormCreate content block
 */
class FormCreate extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context
    ) {
        parent::__construct($context);
    }
    
    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Crud Example Module'));
        
        return parent::_prepareLayout();
    }
}
