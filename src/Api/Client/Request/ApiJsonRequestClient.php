<?php

namespace App\Api\Client\Request;

use App\Api\Client\Response\ApiResponseErrorConverter;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ApiJsonRequestClient implements ApiRequestClientInterface {

    protected $guzzleClient;
    protected $errorConverter;

    public function __construct(ApiResponseErrorConverter $errorConverter) {
        $this->guzzleClient = new Client;
        $this->errorConverter = $errorConverter;
    }

    public function requestApi($method, $endpoint, $params = []) {
        try {
            $respone = $this->guzzleClient->request($method, $endpoint, [
                    'headers' => [
                        'Content-type' => 'application/json',
                    ],
                    'json' => $params,
                ]);
        } catch (ClientException $e) {
            $this->errorConverter->processException($e);
        }

        return json_decode($respone->getBody()->getContents(), true);
    }

}
