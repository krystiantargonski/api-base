<?php

namespace App\Api\Response;

use Symfony\Component\HttpFoundation\JsonResponse;

class ApiResponseManager {

    const RESPONSE_SUCCESS = 'SUCCESS';
    const RESPONSE_ERROR = 'ERROR';
    const RESPONSE_VALIDATION_ERROR = 'VALIDATION_ERROR';
    const RESPONSE_NOT_LOGGED_IN = 'NOT_LOGGED_IN';
    const RESPONSE_ACCESS_DENIED = 'ACCESS_DENIED';

    protected $responseTranslator;

    public function __construct(ApiResponseTranslator $responseTranslator) {
        $this->responseTranslator = $responseTranslator;
    }

    public function getResponse($responseType, $data) {
        return new ApiResponse($responseType, $data);
    }

    public function getSuccessResponse($data) {
        return new JsonResponse(new ApiResponse(self::RESPONSE_SUCCESS, $data), JsonResponse::HTTP_CREATED);
    }

    public function getValidationErrorResponse($data) {
        return new JsonResponse(new ApiResponse(self::RESPONSE_VALIDATION_ERROR, ['error_fields' => $this->responseTranslator->trans($data, 'app_validators')]), JsonResponse::HTTP_NOT_ACCEPTABLE);
    }

    public function getErrorResponse($data) {
        return new JsonResponse(new ApiResponse(self::RESPONSE_ERROR, ['error_fields' => $this->responseTranslator->trans($data, 'app_errors')]), JsonResponse::HTTP_BAD_REQUEST);
    }

    public function getNotLoggedInResponse($data) {
        return new JsonResponse(new ApiResponse(self::RESPONSE_NOT_LOGGED_IN, ['error_fields' => $this->responseTranslator->trans($data, 'app_validators')]), JsonResponse::HTTP_UNAUTHORIZED);
    }

    public function getAccessDeniedResponse($data) {
        return new JsonResponse(new ApiResponse(self::RESPONSE_ACCESS_DENIED, ['error_fields' => $this->responseTranslator->trans($data, 'app_validators')]), JsonResponse::HTTP_BAD_REQUEST);
    }

}
