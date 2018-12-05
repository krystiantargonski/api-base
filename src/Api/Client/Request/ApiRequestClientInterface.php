<?php

namespace App\Api\Client\Request;

interface ApiRequestClientInterface {

    public function requestApi($method, $endpoint, $params = []);
}
