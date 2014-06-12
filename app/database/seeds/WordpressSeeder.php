<?php

class WordpressSeeder extends Seeder {

  public function run() {
    $this->command->info('Seeding wordpress tables...');
    $seeds = array(
      'WordpressUserMetaSeeder', 
      'WordpressTermsSeeder', 
      'WordpressPostSeeder', 
      'WordpressOptionsSeeder'
    );
    foreach($seeds as $seed) {
      $this->call($seed);
    }
  }

}

?>
