<?php

namespace App\Api\Handler;

use App\Api\ApiObjectInterface;
use App\Api\Response\ApiResponseSerializer;

class ExampleHandler extends ApiObjectHandler {
    
    protected $serializer;
    
    /**
     * we can incject all needed dependencies like: entity manager, serializer, aws and other services
     */
    public function __construct(ApiResponseSerializer $serializer) {
        $this->serializer = $serializer;
        $this->validationGroups = ['test', 'Default'];
        $this->serializationGroups = ['test'];
    }
   
    
    /**
     * do all operation on current api object
     * 
     * @param ApiObjectInterface $object
     * @return mixed object|array with data
     */
    public function process(ApiObjectInterface $object) {
       return $this->serializer->processToArray($object, $this->serializationGroups); 
    }
}
