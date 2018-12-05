<?php

namespace App\Api\Request\Data;

use Symfony\Component\HttpFoundation\RequestStack;

class RequestData implements RequestDataInterface {
    
    protected $request;
    
    public function __construct(RequestStack $requestStack) {
        $this->request = $requestStack->getCurrentRequest();
    }
    
    public function getData() {
        return array_merge($this->request->request->all(), $this->request->query->all());
    }
}
