<?php

namespace App\Api\Listener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ExceptionListener {

    public function onKernelException(GetResponseForExceptionEvent $event) {
        $exception = $event->getException();

        if ($exception instanceof HttpExceptionInterface && in_array($exception->getStatusCode(), [404, 405]) ) {
            $response = new JsonResponse(['Incorrect request'], JsonResponse::HTTP_NOT_ACCEPTABLE);
             $event->setResponse($response);
        }
    }

}
