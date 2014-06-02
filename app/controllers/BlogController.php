<?php 

require_once Config::get('wordpress.path').'/wp-blog-header.php';

class BlogController extends BaseController {

  public function home() {
    $posts = get_posts();
    return View::make('blog.index')->with('posts', $posts);
  }

}
