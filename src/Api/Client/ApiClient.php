<?php

namespace App\Api\Client;

use App\Api\Client\Request\ApiRequestClientInterface;

class ApiClient {

    protected $client;

    public function __construct(ApiRequestClientInterface $apiRequestClient) {
        $this->client = $apiRequestClient;
    }
/*
 * //call to another API to login user
    public function loginUser($email, $password) {
        return $this->client->requestApi('POST', '/user/account/create-token', ['email' => $email, 'password' => $password]);
    }
*/
}
