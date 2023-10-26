<?php

namespace Aks\CrudExample\Model\Form;

use Magento\Framework\App\Request\DataPersistorInterface;
use Aks\CrudExample\Model\ResourceModel\Form\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    /**
     * @var $loadedData
     */
    private $loadedData;

    /**
     * @var \Magento\Framework\App\Request\DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @var \Aks\CrudExample\Model\ResourceModel\Form\CollectionFactory
     */
    public $collection;

    /**
     * @param CollectionFactory $collectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param StoreManagerInterface $storeManager
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        StoreManagerInterface $storeManager,
        $name,
        $primaryFieldName,
        $requestFieldName,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        $this->storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();

        foreach ($items as $model) {
            $this->loadedData[$model->getCrudId()] = $model->getData();
            if ($model->getImage()) {
                $m['image'][0]['name'] = $model->getImage();
                $m['image'][0]['url'] = $this->getMediaUrl().$model->getImage();
                $fullData = $this->loadedData;
                $pdata = $fullData[$model->getCrudId()];
                $this->loadedData[$model->getCrudId()] = $this->arrayMerge($pdata, $m);
            }
        }

        $data = $this->dataPersistor->get('crudexample_form');
        
        if (!empty($data)) {
            $model = $this->collection->getNewEmptyItem();
            $model->setData($data);
            $this->loadedData[$model->getCrudId()] = $model->getData();
            $this->dataPersistor->clear('crudexample_form');
        }
        
        return $this->loadedData;
    }

    /**
     * Get Media Url
     *
     * @return string
     */
    public function getMediaUrl()
    {
        $mediaUrl = $this->storeManager->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'crudexample/form/image/';
        return $mediaUrl;
    }

    /**
     * Array Mearge
     *
     * @param array $pdata
     * @param string $m
     * @return void
     */
    public function arrayMerge($pdata, $m)
    {
        return array_merge($pdata, $m);
    }
}
