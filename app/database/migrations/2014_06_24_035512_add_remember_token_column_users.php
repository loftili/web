<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRememberTokenColumnUsers extends Migration {

  public function up() {
    Schema::table('users', function($table) {
      $table->string('remember_token', 100)->nullable();
    });
  }

  public function down() {
    Schema::table('users', function($table) {
      $table->dropColumn('remember_token');
    });
  }

}
