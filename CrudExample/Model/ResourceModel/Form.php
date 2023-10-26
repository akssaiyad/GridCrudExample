<?php

namespace Aks\CrudExample\Model\ResourceModel;

/**
 * Form resource
 */
class Form extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('aks_crud_example', 'crud_id');
    }
}
