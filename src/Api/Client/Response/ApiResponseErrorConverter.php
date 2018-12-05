<?php

namespace App\Api\Client\Response;

use App\Api\Client\Exception\ApiNotAuthorizedException;
use App\Api\Client\Exception\ApiValidationException;
use GuzzleHttp\Exception\ClientException;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiResponseErrorConverter {

    public function processException(ClientException $e) {
        $response = $e->getResponse();
        $statusCode = $response->getStatusCode();
        $content = json_decode($response->getBody()->getContents(), true);

        if ($statusCode === JsonResponse::HTTP_NOT_ACCEPTABLE) {
            throw new ApiValidationException(json_encode($content['error_fields']));
        } elseif ($statusCode === JsonResponse::HTTP_UNAUTHORIZED) {
            throw new ApiNotAuthorizedException($content['error_fields']['message']);
        } else {
            throw new \Exception($content['error_fields']['message']);
        }
    }

}
