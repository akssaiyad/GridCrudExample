<?php

namespace Aks\CrudExample\Model\Resolver\Form;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;


class FormDataById implements ResolverInterface
{
    public function __construct(
        \Aks\CrudExample\Model\Resolver\Form\DataProvider\GraphDataProvider $graphDataProvider
    ){
        $this->graphDataProvider = $graphDataProvider;
    }

    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    )
    {
        $id = $args['crud_id'];
        $data = $this->graphDataProvider->getFormById($id);
        $result = $data ? $data : [];
        return $result;
    }
}