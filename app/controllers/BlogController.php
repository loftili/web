<?php 

require_once Config::get('wordpress.path').'/wp-blog-header.php';

class BlogController extends BaseController {

  public function home() {
    $posts = get_posts();
    foreach($posts as $post) {
      $author_meta = get_user_meta($post->post_author);
      $post->post_author = $author_meta;
    }
    return View::make('blog.index')->with('posts', $posts);
  }

  public function single($id) {
    return "hi" . $id;
  }

}
