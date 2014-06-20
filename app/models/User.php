<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent {

  use UserTrait, RemindableTrait;

  protected $table = 'users';

  protected $hidden = array('password', 'remember_token');

  public function devices() {
    return $this->belongsToMany('Device');
  } 

}
