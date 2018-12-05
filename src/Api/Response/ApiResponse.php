<?php

namespace App\Api\Response;

class ApiResponse implements \JsonSerializable {
    
    protected $responseType;
    protected $data;
            
    public function __construct($responseType, $data) {
        $this->responseType = $responseType;
        $this->data = $data;
    }
    
    public function jsonSerialize() {
        if (!is_array($this->data)) {
            $this->data = [$this->data];
        }
        
        return $this->data;
    }
}
