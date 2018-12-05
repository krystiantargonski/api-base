<?php

namespace App\Api\Response;

use App\Api\ApiObjectInterface;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;

class ApiResponseSerializer {

    protected $serializer;

    public function __construct(SerializerInterface $serializer) {
        $this->serializer = $serializer;
    }

    public function processToArray(ApiObjectInterface $object, $serializationGroups) {
        $context = !empty($serializationGroups) ? SerializationContext::create()->setGroups($serializationGroups) : null;

        return json_decode($this->serializer->serialize($object, 'json', $context), true);
    }

}
