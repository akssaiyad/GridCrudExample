<?php
namespace Aks\CrudExample\Model\ResourceModel\Form;

/**
 * Form Collection
 *
 * @author Magento Core Team <core@magentocommerce.com>
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    
    /**
     * @var string
     */
    protected $_idFieldName = 'crud_id';
    
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(\Aks\CrudExample\Model\Form::class, \Aks\CrudExample\Model\ResourceModel\Form::class);
    }
}
