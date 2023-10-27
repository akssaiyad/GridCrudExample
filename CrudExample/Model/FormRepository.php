<?php

namespace Aks\CrudExample\Model;

use Aks\CrudExample\Model\ResourceModel\Form as ResourceForm;
use Magento\Framework\Exception\CouldNotSaveException;
use Aks\CrudExample\Api\Data\FormSearchResultsInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Aks\CrudExample\Api\Data\FormInterfaceFactory;
use Aks\CrudExample\Model\ResourceModel\Form\CollectionFactory as FormCollectionFactory;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Api\SortOrder;
use Aks\CrudExample\Api\FormRepositoryInterface;

class FormRepository implements FormRepositoryInterface
{

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    private $storeManager;

    /**
     * @var \Aks\CrudExample\Model\ResourceModel\Form
     */
    private $resource;

    /**
     * @var \Aks\CrudExample\Api\Data\FormFactory
     */
    private $FormFactory;

    /**
     * @var \Aks\CrudExample\Api\Data\FormInterfaceFactory
     */
    private $dataFormFactory;

    /**
     * @var \Aks\CrudExample\Model\ResourceModel\Form\CollectionFactory
     */
    private $FormCollectionFactory;

    /**
     * @var \Magento\Framework\Reflection\DataObjectProcessor
     */
    private $dataObjectProcessor;

    /**
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    private $dataObjectHelper;

    /**
     * @var \Aks\CrudExample\Api\Data\FormSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * @param ResourceForm $resource
     * @param FormFactory $formFactory
     * @param FormInterfaceFactory $dataFormFactory
     * @param FormCollectionFactory $formCollectionFactory
     * @param FormSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourceForm $resource,
        FormFactory $formFactory,
        FormInterfaceFactory $dataFormFactory,
        FormCollectionFactory $formCollectionFactory,
        FormSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->formFactory = $formFactory;
        $this->formCollectionFactory = $formCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataFormFactory = $dataFormFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * Save
     *
     * @param  \Aks\CrudExample\Api\Data\FormInterface $form
     * @return mixed
     */
    public function save(
        \Aks\CrudExample\Api\Data\FormInterface $form
    ) {
        try {
            $this->resource->save($form);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the form: %1',
                $exception->getMessage()
            ));
        }
        return $form;
    }

    /**
     * Get Id
     *
     * @param  int $crud_Id
     * @return mixed
     */
    public function getById($crud_Id)
    {
        $form = $this->formFactory->create();
        $this->resource->load($form, $crud_Id);
        if (!$form->getCrudId()) {
            throw new NoSuchEntityException(__('Form with id "%1" does not exist.', $crud_Id));
        }
        return $form;
    }

    /**
     * Get List
     *
     * @param  \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return mixed
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->formCollectionFactory->create();
       
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }

    /**
     * Delete
     *
     * @param  \Aks\CrudExample\Api\Data\FormInterface $form
     * @return mixed
     */
    public function delete(
        \Aks\CrudExample\Api\Data\FormInterface $form
    ) {
        try {
            $this->resource->delete($form);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Form: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete by Crud Id
     *
     * @param  int $crud_Id
     * @return mixed
     */
    public function deleteById($crud_Id)
    {
        return $this->delete($this->getById($crud_Id));
    }
}
