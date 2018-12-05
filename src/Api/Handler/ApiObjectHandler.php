<?php

namespace App\Api\Handler;

use App\Api\ApiObjectInterface;

abstract class ApiObjectHandler implements ApiObjectHandlerInterface {
    
    protected $validationGroups = [];
    protected $serializationGroups = [];
    
    public function getValidationGroups() {
        return $this->validationGroups;
    }
    
    abstract public function process(ApiObjectInterface $object);
}
