<?php

namespace App\Api\Request\Handler;

use App\Api\Data\Example;
use App\Api\Request\Data\RequestDataInterface;
use App\Api\Request\Handler\DataHandlerInterface;
use App\Api\Services\VariableNameConverter;


class DataHandler implements DataHandlerInterface {
    
    const EXAMPLE_OBJECT = Example::class;
    
    public function getObject(RequestDataInterface $requestData, $objectClass) {
        $data = $requestData->getData();
        $object = new $objectClass;
        $objectProperties = get_object_vars($object);
        $objectMethods = get_class_methods($objectClass);
        
        foreach ($data as $propertyName => $propertyValue) {
            $setter = 'set' . ucfirst($propertyName);
            $propertyName = VariableNameConverter::toCamelCase($propertyName);
            if (array_key_exists($propertyName, $objectProperties)) {
                $object->$propertyName = $propertyValue;
            } if (in_array($setter, $objectMethods)) {
                $object->$setter($propertyValue);
            }
        }
        
        return $object;
    }
}
