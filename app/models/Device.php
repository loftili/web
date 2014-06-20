<?php

use Rhumsaa\Uuid\Uuid;
use Loftili\NameApi\NameApiClient;

class Device extends Eloquent {

  protected $table = "devices";

  protected static function boot() {
    parent::boot();

    static::creating(function($device) {
      $device->device_uid = (string)Uuid::uuid1();
    });
  }

  public function save(array $options = array()) {
    try {
      parent::save($options);
    } catch(Exception $e) {
      Log::debug('Aborting device save before dns update - unable to create device');
      throw $e;
    }

    $api_client = new NameApiClient();
    $api_client->setApiToken(Config::get('vendor.name.api_token'));
    $api_client->setApiUser(Config::get('vendor.name.api_user'));
    $dns_id = $api_client->registerSubdomain(Config::get('vendor.name.app_domain'), $this->device_uid);

    $this->dns_id = $dns_id;
    parent::save();
  }

  public function users() {
    return $this->belongsToMany('User');
  }

}
