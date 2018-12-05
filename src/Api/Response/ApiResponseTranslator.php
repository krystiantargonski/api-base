<?php

namespace App\Api\Response;

use Symfony\Component\Translation\TranslatorInterface;

class ApiResponseTranslator {

    protected $translator;

    public function __construct(TranslatorInterface $translator) {
        $this->translator = $translator;
    }

    public function trans($response, $domain = null) {
        if (!is_array($response)) {
            return $this->translator->trans($response, [], $domain);
        }
        
        foreach ($response as &$item) {
            $item = $this->translator->trans($item, [] ,$domain);
        }
        
        return $response;
    }
}
