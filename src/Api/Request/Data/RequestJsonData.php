<?php

namespace App\Api\Request\Data;

class RequestJsonData extends RequestData {

    public function getData() {
        if (0 === strpos($this->request->headers->get('Content-Type'), 'application/json')) {
            $data = json_decode(urldecode($this->request->getContent()), true);
            return is_array($data) ? $data : [];
        }
        
        return parent::getData();
    }
}
