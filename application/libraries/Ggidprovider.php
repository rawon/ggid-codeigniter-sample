<?php

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Entity\User;
use League\OAuth2\Client\Token\AccessToken;

class Ggidprovider extends AbstractProvider
{
    public $responseType = 'json';
    public $authorizationHeader = 'Bearer';
    public $domain = 'https://gg-id.net';
    public $apiDomain = 'https://gg-id.net/api';
    
    public function urlAuthorize()
    {
        return $this->domain.'/o/authorize/';
    }
    public function urlAccessToken()
    {
        return $this->domain.'/o/token/';
    }
    public function urlUserDetails(AccessToken $token)
    {
        return $this->apiDomain.'/users/me/';
    }
    public function userDetails($response, AccessToken $token)
    {
        $user = new User();
        $name = (isset($response->name)) ? $response->name : null;
        $email = (isset($response->email)) ? $response->email : null;
        $user->exchangeArray([
            'uid' => $response->id,
            'name' => $name,
            'email' => $email,
        ]);
        
        return $user;
    }
    public function userUid($response, AccessToken $token)
    {
        return $response->id;
    }
    
}