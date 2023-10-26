<?php

namespace Aks\CrudExample\Controller\Adminhtml\Form;

class Edit extends \Aks\CrudExample\Controller\Adminhtml\Form
{

    /**
     * @var $resultPageFactory
     */
    private $resultPageFactory;

    /**
     * @var \Aks\CrudExample\Model\Form
     */
    private $formModel;

    /**
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Aks\CrudExample\Model\Form $formModel
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Aks\CrudExample\Model\Form $formModel
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->formModel = $formModel;
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Check admin permissions for this controller
     *
     * @return boolean
     */
    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Aks_CrudExample::aks_crud');
    }
    
    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('crud_id');
        $model = $this->formModel;
        
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getCrudId()) {
                $this->messageManager->addErrorMessage(__('This Form no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->coreRegistry->register('crudexample_form', $model);
        
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Form') : __('New Form'),
            $id ? __('Edit Form') : __('New Form')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Crud Example Forms'));
        $resultPage->getConfig()->getTitle()->prepend(
            $model->getCrudId() ? $model->getTitle() : __('New Crud Example Form')
        );
        return $resultPage;
    }
}
