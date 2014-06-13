<?php

class WordpressUser extends Eloquent {

  protected $table = 'wp_users';
  protected $guarded = array();
  public $timestamps = false;

}
