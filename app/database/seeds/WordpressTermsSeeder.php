<?php

class WordpressTermsSeeder extends seeder {

  public function run() {
    $this->command->info('- Creating default wp_terms');
    $uncat = new WordpressTerm;
    $uncat->name = "Uncategorized";
    $uncat->slug = "uncategorized";
    $uncat->save();
  }

}

?>
