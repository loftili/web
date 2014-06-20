<?php namespace Loftili\NameApi;

interface NameApiClientInterface {
  
  public function setApiToken();
  public function setApiUser();

  public function registerSubdomain();

}

?>
