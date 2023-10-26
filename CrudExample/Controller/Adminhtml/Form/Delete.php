<?php
namespace Aks\CrudExample\Controller\Adminhtml\Form;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Delete extends Action
{

    /**
     * @var \Aks\CrudExample\Model\FormFactory
     */
    public $formFactory;

    /**
     * @param \Aks\CrudExample\Model\FormFactory $formFactory
     */
    public function __construct(
        Context $context,
        \Aks\CrudExample\Model\FormFactory $formFactory
    ) {
        $this->formFactory = $formFactory;
        parent::__construct($context);
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('crud_id');
        //if ($id) {
            try {
                // init model and delete
                $formModel = $this->formFactory->create();
                $formModel->load($id);
                $formModel->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Crud Example Form.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['crud_id' => $id]);
            }
        //}
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Crud Example Form to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
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
}
