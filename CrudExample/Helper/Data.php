<?php

namespace Aks\CrudExample\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    /**
     * Get Config Value
     *
     * @param  string $config
     * @return array|mixed|null
     */
    public function getConfig($config)
    {
        return $this->scopeConfig->getValue(
            $config,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Check Enable Module
     *
     * @return mixed
     */
    public function isEnableModuleCrudExample()
    {
        return $this->getConfig('aks_crud/general/enable');

    }
}
