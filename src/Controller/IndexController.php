<?php

namespace App\Controller;

use App\Api\Handler\ExampleHandler;
use App\Api\Request\ApiRequestManager;
use App\Api\Request\Data\RequestJsonData;
use App\Api\Request\Handler\DataHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller{
    
    /**
     * @Route("/", name="homepage", methods={"GET"})
     * @return JsonResponse
     */
    public function indexAction() {

        return new JsonResponse(['example api'], JsonResponse::HTTP_OK);
    }
    
    /** 
     * @Route("/", name="example", methods={"POST"})
     * @return JsonResponse
     */
    public function exampleAction(RequestJsonData $requestData, ApiRequestManager $requestManager, ExampleHandler $handler) {
        return $requestManager->processRequest($requestData, DataHandler::EXAMPLE_OBJECT, $handler);
    }
}
