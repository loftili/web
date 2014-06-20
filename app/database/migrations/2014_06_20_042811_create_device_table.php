<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceTable extends Migration {

  public function up() {
    Schema::create('devices', function($table) {
      $table->increments('id');
      $table->string('device_uid');
      $table->string('ip_address')->nullable();
      $table->string('dns_id')->nullable();
      $table->timestamps();
    });
	}

  public function down() {
    Schema::drop('devices');
	}

}
