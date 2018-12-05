<?php

namespace App\Api\Request\Handler;

use App\Api\Request\Data\RequestDataInterface;

interface DataHandlerInterface {
    
    public function getObject(RequestDataInterface $requestData, $objectClass);
}
