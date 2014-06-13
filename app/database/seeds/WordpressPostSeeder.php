<?php

class WordpressPostSeeder extends Seeder {

  public function run() {
    $this->command->info('- Creating a few wp_posts');

    $post_content = File::get(app_path().'/database/wp/example_post.txt');

    $date_now = new DateTime;
    $post = new BlogPost;
    $post->post_author = 1;
    $post->post_date = $date_now;
    $post->post_date_gmt = $date_now;
    $post->post_content = $post_content;
    $post->post_title = 'Nulla augue ipsum, egestas sollicitudin in nisl';
    $post->post_status = 'publish';
    $post->post_name = 'database-seed';
    $post->post_modified = $date_now;
    $post->post_modified_gmt = $date_now;
    $post->post_parent = 0;
    $post->guid = 'fakeguidseed-1';
    $post->comment_status = 'open';
    $post->menu_order = 0;
    $post->post_type = 'post';
    $post->comment_count = 0;
    $post->save();
  }

}
