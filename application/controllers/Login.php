<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  public function index(){
    $this->load->library('session');
    $this->load->library('ggidprovider', [
        'clientId'      => 'your application client id', //change this accordingly
        'clientSecret'  => 'your application client secret', //change this accordingly
        'redirectUri'   => 'http://localhost/index.php/login', //your app must set redirect URI to this
        'scopes'        => ['all'],
    ]);

    if (!isset($_GET['code'])) {

        // If we don't have an authorization code then get one
        $authUrl = $this->ggidprovider->getAuthorizationUrl();
        $_SESSION['oauth2state'] = $this->ggidprovider->state;
        header('Location: '.$authUrl);
        exit;

    // Check given state against previously stored one to mitigate CSRF attack
    } elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

        unset($_SESSION['oauth2state']);
        exit('Invalid state');

    } else {

        // Try to get an access token (using the authorization code grant)
        $token = $this->ggidprovider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);

            $data = array();
        // Optional: Now you have a token you can look up a users profile data
        try {

            // We got an access token, let's now get the user's details
            $userDetails = $this->ggidprovider->getUserDetails($token);
            $data['user'] = $userDetails;
        } catch (Exception $e) {
            // Failed to get user details
            exit('Oh dear...');
        }
        
        $this->load->view('login_done', $data);
    }
  }
}