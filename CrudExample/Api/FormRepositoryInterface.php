<?php

namespace Aks\CrudExample\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface FormRepositoryInterface
{
    /**
     * Save Form
     *
     * @param  \Aks\CrudExample\Api\Data\FormInterface $formData
     * @return \Aks\CrudExample\Api\Data\FormInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Aks\CrudExample\Api\Data\FormInterface $form);

    /**
     * Retrieve Form
     *
     * @param int $crudId
     * @return \Aks\CrudExample\Api\Data\FormInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($crudId);

    /**
     * Retrieve Form matching the specified criteria.
     *
     * @param  \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Aks\CrudExample\Api\Data\FormSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Add Update Data
     *
     * @param string[] $data
     * @return \Aks\CrudExample\Api\Data\FormInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function updateData($data);

    /**
     * Delete Form
     *
     * @param \Aks\CrudExample\Api\Data\FormInterface $formData
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Aks\CrudExample\Api\Data\FormInterface $formData);

    /**
     * Delete Form by Id
     *
     * @param int $crudId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($crudId);
}
