<?php

class GoogleAuthController extends Controller {

  private $client;
  private $oauth2;
  private $plus;

  function __construct() {
    Log::info('Preparing a GoogleAuthController instance');
    $client_id = Config::get('vendor.google.client_id');
    $client_secret = Config::get('vendor.google.client_secret');
    $redirect_uri = Config::get('vendor.google.redirect_uri');
    $api_key = Config::get('vendor.google.api_key');

    $this->client = new Google_Client( );
    $this->client->setClientId($client_id);
    $this->client->setClientSecret($client_secret);
    $this->client->setRedirectUri($redirect_uri);
    $this->client->setDeveloperKey($api_key);
    $this->oauth2 = new Google_Service_Oauth2($this->client);
    $this->plus = new Google_Service_Plus($this->client);
  }

  public function authenticate() {
    $code = Input::get('code');
    $access_token = false;

    if($code) {
      $this->client->authenticate($code);
      $access_token = $this->client->getAccessToken();
    } else {
      return App::abort(401, 'You don\'t really belong here...');
    }

    return $this->oauth2->userinfo->get()['email'];
  }

}

?>
