<?php

namespace App\Api\Data;

use App\Api\ApiObjectInterface;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as JMS;

class Example implements ApiObjectInterface{
    
    /**
     * @JMS\Groups({"example"})
     * @Assert\NotBlank
     */
    public $name;
    
    /**
     * @JMS\Groups({"example", "test"})
     * @Assert\NotBlank
     */
    protected $description;
    
    /**
     * @JMS\Groups({"example", "test"})
     * @var type 
     */
    public $testName;
    
    public function getDescription() {
        return $this->description;
    }
    
    public function setDescription($val) {
        $this->description = $val;
    } 
}
