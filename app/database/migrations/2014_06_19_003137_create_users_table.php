<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

  public function up() {
    Schema::create('users', function($table) {
      $table->increments('id');

      $table->string('first_name');
      $table->string('last_name');
      $table->string('email')->unique();
      $table->string('password')->nullable();
      $table->string('google_id')->nullable();

      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('users');
  }

}

