<?php

namespace Aks\CrudExample\Model\Resolver\Form\DataProvider;

class GraphDataProvider
{
   /**
   * @param
   */
    public function __construct(
        \Aks\CrudExample\Model\FormFactory $formApiFactory,
        \Aks\CrudExample\Model\ResourceModel\Form\CollectionFactory $formApiCollectionFactory

    ) {
        $this->formApiFactory = $formApiFactory;
        $this->formApiCollectionFactory = $formApiCollectionFactory;
    }

    public function insertFormData($name, $email, $image, $occupation, $storeId, $status)
    {
        $message = [];
        try {
            $formApi = $this->formApiFactory->create();
            $data = [
                "name" => $name,
                "email" => $email,
                "image" => $image,
                "occupation" => $occupation,
                "store_id" => $storeId,
                "status" => $status
            ];      
            $formApi->setData($data);
            $formApi->save();
            $msg = "Save Data Successfully ".$name;            
        	$message['message'] = $msg;

        } catch (\Exception $e) {
        	$message['message'] = "Error".$e;
        }        
        return $message;
    }

    public function getCrudExampleFormData()
    {   
        try {
            $collection = $this->formApiCollectionFactory->create()->getData();

        } catch (NoSuchEntityException $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()), $e);
        }
        return $collection;
    }
    
    public function updateFormData($id, $name, $email, $image, $occupation, $storeId, $status)
    {
        try {
            $formApi = $this->formApiFactory->create();
            $data = [
                "crud_id" => $id,
                "name" => $name,
                "email" => $email,
                "image" => $image,
                "occupation" => $occupation,
                "store_id" => $storeId,
                "status" => $status
            ];
            $formApi->setData($data);
            $formApi->save();
            $msg = "Update Data Successfully Id is ".$id;
        	$message['message'] = $msg;

        } catch (\Exception $e) {
        	$message['message'] = "Error".$e;
        }        
        return $message;
    }

    public function getFormById($id)
    {   
        try {
            $data = [];
            $collection = $this->formApiCollectionFactory->create()
            ->addFieldToFilter('crud_id', ['eq'=> $id])
            ->getData();
            foreach ($collection as $collect) {
                $data = [
                    'crud_id' => $collect['crud_id'],
                    'name' => $collect['name'],
                    'email' => $collect['email'],
                    'image' => $collect['image'],
                    'occupation' => $collect['occupation'],
                    'store_id' => $collect['store_id'],
                    'status' => $collect['status']
                ];
            }
        } catch (NoSuchEntityException $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()), $e);
        }
        return $data;
    
    }
    public function deleteFormById($id)
    {
        try {
            $formApi = $this->formApiFactory->create();
            $formApi->load($id);
            $formApi->delete();
            $msg = "Delete Data Successfully Id is ".$id;
        	$message['message'] = $msg;

        } catch (\Exception $e) {
        	$message['message'] = "Error".$e;
        }        
        return $message;
    }
}