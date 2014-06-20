<?php namespace Loftili\NameApi;

use Illuminate\Support\ServiceProvider;

class NameApiServiceProvider extends ServiceProvider {

  protected $defer = false;

	public function register() { }

  public function boot() {
    $this->package('loftili/nameapi');
  }
  
  public function provides() {
		return array();
	}

}
