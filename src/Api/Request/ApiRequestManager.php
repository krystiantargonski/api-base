<?php

namespace App\Api\Request;

use App\Api\Client\Exception\ApiNotAuthorizedException;
use App\Api\Client\Exception\ApiValidationException;
use App\Api\Handler\ApiObjectHandlerInterface;
use App\Api\Request\Data\RequestDataInterface;
use App\Api\Request\Handler\DataHandlerInterface;
use App\Api\Response\ApiResponseManager;
use App\Api\Validator\ApiValidator;

class ApiRequestManager {

    protected $dataHandler;
    protected $validator;
    protected $responseManager;

    public function __construct(DataHandlerInterface $dataHandler, ApiValidator $validator, ApiResponseManager $responseManager) {
        $this->dataHandler = $dataHandler;
        $this->validator = $validator;
        $this->responseManager = $responseManager;
    }

    public function processRequest(RequestDataInterface $requestData, $dataClass, ApiObjectHandlerInterface $handler) {
        try {
            $object = $this->dataHandler->getObject($requestData, $dataClass);
            if (($errors = $this->validator->validate($object, $handler->getValidationGroups())) !== true) {
                return $this->responseManager->getValidationErrorResponse($errors);
            }

            $data = $handler->process($object);
            return $this->responseManager->getSuccessResponse($data);
        } catch(ApiValidationException $e) {
            return $this->responseManager->getValidationErrorResponse(json_decode($e->getMessage(), true));
        } catch(ApiNotAuthorizedException $e) {
            return $this->responseManager->getNotLoggedInResponse(['message' => $e->getMessage()]);
        } catch (\Exception $e) {
            return $this->responseManager->getErrorResponse(['message' => $e->getMessage()]);
        }
    }

}
