<?php

namespace App\Api\Validator;

use Symfony\Component\Validator\ConstraintViolationListInterface;

class ErrorsFormatter {

    public function format(ConstraintViolationListInterface $violations) {
        $errors = [];
        foreach ($violations as $violation) {
            $errors[$violation->getPropertyPath()] = $violation->getMessage();
        }
        return $errors;
    }

}
