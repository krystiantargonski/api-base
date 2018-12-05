<?php

namespace App\Api\Handler;

use App\Api\ApiObjectInterface;

interface ApiObjectHandlerInterface {

    public function getValidationGroups();

    public function process(ApiObjectInterface $object);
}
