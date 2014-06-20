<?php namespace Loftili\NameApi;

class NameApiTestClient implements NameApiClientInterface {

  public function setApiToken($api_token = "") { }
  public function setApiUser($api_token = "") { }

  public function registerSubdomain($api_token = "") { 
    return 10;
  }

}

?>
