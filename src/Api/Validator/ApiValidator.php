<?php

namespace App\Api\Validator;

use App\Api\ApiObjectInterface;
use App\Api\Services\VariableNameConverter;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiValidator {
    
    protected $validator;
    
    protected $errorFormatter;
    
    public function __construct(ValidatorInterface $validator, ErrorsFormatter $errorFormatter) {
        $this->validator = $validator;
        $this->errorFormatter = $errorFormatter;
    }
    
    public function validate(ApiObjectInterface $object, $groups) {
        $errors = $this->validator->validate($object, null, $groups);
        if (count($errors) > 0) {
            $errorsData = $this->errorFormatter->format($errors);
            $results = [];
            foreach ($errorsData as $errorName => $errorValue) {
                $results[VariableNameConverter::uncamelCase($errorName)] = $errorValue;
            }
            
            return $results;
        }
        
        return true;
    }
}
