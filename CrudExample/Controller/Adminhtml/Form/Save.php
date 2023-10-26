<?php

namespace Aks\CrudExample\Controller\Adminhtml\Form;

use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    /**
     * @var \Magento\Framework\App\Request\DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @var \Aks\CrudExample\Model\Form
     */
    private $formModel;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Aks\CrudExample\Model\Form $formModel
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Aks\CrudExample\Model\Form $formModel,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->formModel = $formModel;
        parent::__construct($context);
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
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if ($data) {
            $id = $this->getRequest()->getParam('crud_id');
        
            $model = $this->formModel->load($id);
            if (!$model->getCrudId() && $id) {
                $this->messageManager->addErrorMessage(__('This Crud Example is longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
            
            $data = $this->_filterFormData($data);
            $model->setData($data);
        
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Crud Example Form.'));
                $this->dataPersistor->clear('crudexample_form');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['crud_id' => $model->getCrudId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager
                ->addExceptionMessage($e, __('Something went wrong while saving the Form.'));
            }
        
            $this->dataPersistor->set('crudexample_form', $data);
            return $resultRedirect->setPath(
                '*/*/edit',
                [
                    'crud_id' => $this->getRequest()->getParam('crud_id')
                ]
            );
        }
        return $resultRedirect->setPath('*/*/');
    }

    /**
     * Image Data
     *
     * @param  array $rawData
     * @return _filterFormData
     */
    public function _filterFormData(array $rawData)
    {
        $data = $rawData;
        if (isset($data['image'][0]['name'])) {
            $data['image'] = $data['image'][0]['name'];
        } else {
            $data['image'] = null;
        }
        return $data;
    }
}
