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

  public function registerSubdomain($parent_domain, $subdomain_name) {
    $request = $this->prepareRequest('/api/dns/create/'.$parent_domain);

    $request_body = $this->prepareBody(array(
      "hostname" => $subdomain_name,
      "type" => "A"
    ));

    $request->setBody($request_body);
    $response = $this->http_client->send($request);
    $resp_obj = json_decode((string)$response->getBody(), true);

    if($this->getApiResultCode($response) !== 100)
      throw new Exception("Unable to create dns entry.");

    return $resp_obj["record_id"];
  }

  public function getApiResultCode($response) {
    $resp_obj = json_decode((string)$response->getBody(), true);
    return array_key_exists('result', $resp_obj) ? (int)$resp_obj["result"]["code"] : -1;
  }

  public function setApiToken($token = "") {
    $this->api_token = $token;
  }

  public function setApiUser($user = "") {
    $this->api_user = $user;
  }

  private function prepareBody($obj) {
    $json = json_encode($obj);
    return \GuzzleHttp\Stream\Stream::factory($json);
  }

  private function prepareRequest($api_url) {
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
