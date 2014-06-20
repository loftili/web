<?php

use Rhumsaa\Uuid\Uuid;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Loftili\NameApi\NameApiClient;

class User extends Eloquent {

  use UserTrait, RemindableTrait;

  protected $table = 'users';

  protected $hidden = array('password', 'remember_token');

  protected static function boot() {
    parent::boot();

    static::creating(function($user) {
      $user->uid = (string)Uuid::uuid1();
    });
  }

  public function save(array $options = array()) {
    try {
      parent::save($options);
    } catch (Exception $e) {
      throw $e;
    }

    $name_client = new NameApiClient();
    $api_token = Config::get('vendor.name.api_token');
    $api_user = Config::get('vendor.name.api_user');

    $name_client->setApiToken($api_token);
    $name_client->setApiUser($api_user);
    if(Config::get('vendor.name.testing') === true)
      $name_client->toggleTesting();

    $name_client->registerSubdomain($this->uid);
  }

}
