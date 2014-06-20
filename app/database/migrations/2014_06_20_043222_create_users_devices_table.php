<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersDevicesTable extends Migration {

  public function up() {
    Schema::create('device_user', function($table) {
      $table->increments('id');
      $table->integer('user_id');
      $table->integer('device_id');
      $table->integer('access_level');
    });
  }

  public function down() {
    Schema::drop('device_user');
  }

}
