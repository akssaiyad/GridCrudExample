<?php
namespace Aks\CrudExample\Api\Data;

interface FormInterface
{

    public const CRUD_ID        = 'crud_id';
    public const NAME           = 'name';
    public const EMAIL          = 'email';
    public const IMAGE          = 'image';
    public const OCCUPATION     = 'occupation';
    public const STORE_ID       = 'store_id';
    public const STATUS         = 'status';
    public const UPDATED_AT     = 'updated_at';
    public const CREATED_AT     = 'created_at';
    
    /**
     * Get crud_id
     *
     * @return string|null
     */
    public function getCrudId();

    /**
     * Set crud_id
     *
     * @param string $crud_id
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function setCrudId($crud_id);
    
    /**
     * Get name
     *
     * @return string|null
     */
    public function getName();
    
    /**
     * Set name
     *
     * @param string $name
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function setName($name);
   
    /**
     * Get email
     *
     * @return string|null
     */
    public function getEmail();
    
    /**
     * Set email
     *
     * @param string $email
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function setEmail($email);
   
    /**
     * Get image
     *
     * @return string|null
     */
    public function getImage();

    /**
     * Set image
     *
     * @param string $image
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function setImage($image);

    /**
     * Get store_id
     *
     * @return string|null
     */
    public function getStoreId();
    
    /**
     * Set store_id
     *
     * @param string $store_id
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function setStoreId($store_id);

    /**
     * Get occupation
     *
     * @return string|null
     */
    public function getOccupation();
    
    /**
     * Set occupation
     *
     * @param string $occupation
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function setOccupation($occupation);

    /**
     * Get updatedat
     *
     * @return string|null
     */
    public function getUpdatedAt();
   
    /**
     * Set updatedat
     *
     * @param string $updatedat
     * @return \Aks\CrudExample\Api\Data\CategoryInterface
     */
    public function setUpdatedAt($updatedat);

    /**
     * Get createdat
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set createdat
     *
     * @param string $createdat
     * @return \Aks\CrudExample\Api\Data\CategoryInterface
     */
    public function setCreatedAt($createdat);
    /**
     * Get status
     *
     * @return string|null
     */
    public function getStatus();
   
    /**
     * Set status
     *
     * @param string $status
     * @return \Aks\CrudExample\Api\Data\FormInterface
     */
    public function setStatus($status);
}
