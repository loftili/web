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
    $scopes = Config::get('vendor.google.scopes');

    $this->client = new Google_Client( );
    $this->client->setClientId($client_id);
    $this->client->setClientSecret($client_secret);
    $this->client->setRedirectUri($redirect_uri);
    $this->client->setDeveloperKey($api_key);
    $this->client->setScopes($scopes);
    $this->oauth2 = new Google_Service_Oauth2($this->client);
    $this->plus = new Google_Service_Plus($this->client);
  }

  public function getUrl() {
    return Response::json(array(
      'auth_url' => $this->client->createAuthUrl()
    ));
  }

  public function getCallback() {
    $code = Input::get('code');
    $access_token = false;
    $token_json = '';

    if($code == null) {
      Log::debug('Invalid attempt to access google auth callback page');
      return App::abort(401, 'You don\'t really belong here...');
    }
    
    $google_user = false;
    try {
      $this->client->authenticate($code);
      $token_json = $this->client->getAccessToken();
      $google_user = $this->oauth2->userinfo->get();
    } catch(Exception $e) {
      Log::debug('Failed google authentication - '.$e);
      return App::abort(401, 'Authentication with google failed.');
    }

    $email = $google_user['email'];
    $first_name = $google_user['givenName'];
    $last_name = $google_user['familyName'];
    $google_id = $google_user['id'];

    if(!$email || !$first_name || !$last_name || !$google_id) {
      Log::debug('Failed creating a google user due to missing information', array('context' => $google_user));
      return App::abort(401, 'Google account not eligible as a loftili account');
    }

    $app_user = new User;
    $app_user->email = $email;
    $app_user->last_name = $last_name;
    $app_user->first_name = $first_name;
    $app_user->google_id = $google_id;

    try {
      $app_user->save();
    } catch(Exception $e) {
      Log::debug('Failed saving google user'.$e);
      return App::abort(401, 'Unable to save the user to the database');
    }

    $user_json = json_encode(array(
      "uid" => $app_user->uid,
      "first_name" => $app_user->first_name,
      "last_name" => $app_user->last_name,
      "email" => $app_user->email
    ));

    return View::make('auth.google_callback')->with('user_info', $user_json);
  }

}

?>
