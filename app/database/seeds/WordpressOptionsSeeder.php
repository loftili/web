<?php

class WordpressOptionsSeeder extends Seeder {

  public function run() {
    $this->command->info('- Filling in the wp_options');
    $options = File::get(app_path().'/database/dumps/wp_options.sql');
    DB::statement($options);
    $this->command->info("-- Success!");
  }

}
