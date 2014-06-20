<?php namespace Loftili\NameApi;

use Illuminate\Support\ServiceProvider;

class NameApiServiceProvider extends ServiceProvider {

  protected $defer = false;

	public function register() { 
    $this->app->bind('nameapi', function($app) {
      return $app->environment() === 'testing' ? new NameApiTestClient : new NameApiClient;
    });
  }

  public function boot() {
    $this->package('loftili/nameapi');
  }
  
  public function provides() {
		return array('nameapi');
	}

}
