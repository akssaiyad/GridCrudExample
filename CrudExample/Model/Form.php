<?php

namespace Aks\CrudExample\Model;

use Aks\CrudExample\Api\Data\FormInterface;

class Form extends \Magento\Framework\Model\AbstractModel implements FormInterface
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Aks\CrudExample\Model\ResourceModel\Form::class);
    }

    /**
     * Get crud_id
     *
     * @return string
     */
    public function getCrudId()
    {
        return $this->getData(self::CRUD_ID);
    }

    /**
     * Set crud_id
     *
     * @param string $crud_id
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function setCrudId($crud_id)
    {
        return $this->setData(self::CRUD_ID, $crud_id);
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set name
     *
     * @param string $name
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Set email
     *
     * @param string $email
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * Set image
     *
     * @param string $image
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * Get store_id
     *
     * @return string
     */
    public function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    /**
     * Set store_id
     *
     * @param string $store_id
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function setStoreId($store_id)
    {
        return $this->setData(self::STORE_ID, $store_id);
    }
    
    /**
     * Get occupation.
     *
     * @return varchar occupation
     */
    public function getOccupation()
    {
        return $this->getData(self::OCCUPATION);
    }
 
    /**
     * Set occupation.
     *
     * @param string $occupation
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function setOccupation($occupation)
    {
        return $this->setData(self::OCCUPATION, $occupation);
    }

    /**
     * Get updated_at
     *
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }
 
    /**
     * Set updated_at
     *
     * @param date $updatedat
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function setUpdatedAt($updatedat)
    {
        return $this->setData(self::UPDATED_AT, $updatedat);
    }
 
    /**
     * Get created_at
     *
     * @return date
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }
 
    /**
     * Set created_at
     *
     * @param date $createdat
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function setCreatedAt($createdat)
    {
        return $this->setData(self::CREATED_AT, $createdat);
    }
    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set status
     *
     * @param string $status
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
}
