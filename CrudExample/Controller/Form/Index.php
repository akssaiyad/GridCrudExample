<?php

namespace Aks\CrudExample\Controller\Form;

class Index extends \Magento\Framework\App\Action\Action
{
	/**
     * @var \Aks\CrudExample\Helper\Data
     */
    protected $helperConfig;
    
    /**
    * @param \Aks\CrudExample\Helper\Data $helperConfig
    */
    public function __construct(
        \Aks\CrudExample\Helper\Data $helperConfig,
        \Magento\Framework\View\Element\Template\Context $context
    ) {
        $this->helperConfig = $helperConfig;
        parent::__construct($context);
    }

    public function execute()
    {
        $enableModule = $this->helperConfig->isEnableModuleCrudExample();
        if ($enableModule) {
            $this->_view->loadLayout();
            $this->_view->getLayout()->initMessages();
            $this->_view->renderLayout();
        } else {
            $this->_redirect('404');
        }
    }
}
