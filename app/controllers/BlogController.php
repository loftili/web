<?php 

require_once Config::get('wordpress.path').'/wp-blog-header.php';

class BlogController extends BaseController {

  public function home() {
    $posts = get_posts();
    foreach($posts as $post) {
      $author_meta = get_user_meta($post->post_author);
      $post->author = $author_meta;
      $post->timestamp = strtotime($post->post_date) * 1000;
    }
    return View::make('blog.index')->with('posts', $posts);
  }

  public function single($id) {
    $post = BlogPost::find($id);

    if($post === null)
      return Redirect::route('blog_root');

    return View::make('blog.view')->with('post', $post)->with('title', $post->post_title);
  }

}
