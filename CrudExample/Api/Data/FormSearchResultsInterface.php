<?php

namespace Aks\CrudExample\Api\Data;

interface FormSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    
    /**
     * Get Items
     *
     * @param string $items
     * @return Aks\CrudExample\Api\Data\FormSearchResultsInterface
     */
    public function getItems();
    
    /**
     * Set Items
     *
     * @param string $items
     * @return Aks\CrudExample\Api\Data\FormSearchResultsInterface
     */
    public function setItems(array $items);
}
