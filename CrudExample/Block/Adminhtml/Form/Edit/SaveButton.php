<?php

namespace Aks\CrudExample\Block\Adminhtml\Form\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * Get Button Data
     *
     * @return array ButtonData
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save Data'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
