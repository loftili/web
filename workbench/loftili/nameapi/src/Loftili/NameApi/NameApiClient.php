<?php namespace Loftili\NameApi;

class NameApiClient {

  private $api_token;
  private $api_user;
  private $api_url_live = "https://api.name.com";
  private $api_url_test = "https://api.dev.name.com";
  private $testing = false;
  private $http_client;

  function __construct($configuration = array()) {
    $this->api_token = array_key_exists('api_token', $configuration) ? $configuration['api_token'] : '';
    $this->api_user = array_key_exists('api_user', $configuration) ? $configuration['api_user'] : '';

    $this->http_client = new \GuzzleHttp\Client;
  }

  public function registerSubdomain() {
    $request = $this->prepareRequest('/api/dns/list/lofti.li');
    $response = $this->http_client->send($request);
  }

  public function setApiToken($token = "") {
    $this->api_token = $token;
  }

  public function setApiUser($user = "") {
    $this->api_user = $user;
  }

  public function prepareRequest($api_url) {
    $api_home = $this->testing ? $this->api_url_test : $this->api_url_live;
    $request = $this->http_client->createRequest('POST', $api_home.$api_url);
    $this->addHeaders($request);
    return $request;
  }

  private function addHeaders($request) {
    $request->setHeader('Api-Username', $this->api_user);
    $request->setHeader('Api-Token', $this->api_token);
  }

  public function toggleTesting() {
    $this->testing = true;
  }

}

?>
