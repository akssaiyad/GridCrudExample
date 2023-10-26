<?php

namespace Aks\CrudExample\Controller;

use Magento\Framework\App\RequestInterface;

class Router implements \Magento\Framework\App\RouterInterface
{
    /**
     * @var \Magento\Framework\App\ActionFactory
     */
    protected $actionFactory;

    /**
     * @var \Magento\Framework\App\ResponseInterface
     */
    protected $_response;

    /**
     * @var \Aks\CrudExample\Helper\Data
     */
    protected $helperConfig;

    /**
     * @param \Magento\Framework\App\ActionFactory $actionFactory
     * @param \Magento\Framework\App\ResponseInterface $response
     * @param \Aks\CrudExample\Helper\Data $helperConfig
     */
    public function __construct(
        \Magento\Framework\App\ActionFactory $actionFactory,
        \Magento\Framework\App\ResponseInterface $response,
        \Aks\CrudExample\Helper\Data $helperConfig
    ) {
        $this->actionFactory = $actionFactory;
        $this->_response = $response;
        $this->helperConfig = $helperConfig;
    }

    /**
     * Match provided request and if matched - return corresponding controller
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return \Magento\Framework\App\ActionInterface|null
     */
    public function match(RequestInterface $request)
    {
        $enableModule = $this->helperConfig->isEnableModuleCrudExample();
        $identifier = trim($request->getPathInfo(), '/');
        $identifierUrl = str_replace("crudexample/", "", trim($request->getPathInfo(), '/'));

        $projectUrl = explode("/", $identifierUrl);
        $success = false;
        if ($enableModule) {
            $request->setModuleName('crudexample');
            $request->setControllerName('form');
            $request->setActionName('index');
            $success = true;
            return $this->actionFactory->create(
                \Magento\Framework\App\Action\Forward::class,
                ['request' => $request]
            );
        } else {
            return null;
        }

        if (!$success) {
            return null;
        }
    }
}
