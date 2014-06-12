<?php

class WordpressSeeder extends Seeder {

  public function run() {
    $this->command->info('Seeding wordpress tables...');
    $this->call('WordpressPostSeeder');
    $this->call('WordpressOptionsSeeder');
  }

}

?>
