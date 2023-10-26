<?php

namespace Aks\CrudExample\Controller\Adminhtml;

abstract class Form extends \Magento\Backend\App\Action
{

    public const ADMIN_RESOURCE = 'Aks_CrudExample::aks_crud';

    /**
     * @var coreRegistry
     */
    private $coreRegistry;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /**
     * Init page
     *
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     */
    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE)
            ->addBreadcrumb(__('Aks'), __('Aks'))
            ->addBreadcrumb(__('Crud Example'), __('Crud Example'));
        return $resultPage;
    }
}
