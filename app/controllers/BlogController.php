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

  public function single($slug) {
    // try finding the post by id first
    $post = BlogPost::find($slug);

    if($post == null)
      return $this->singleBySlug($slug);
    else
      return Redirect::to('/blog/'.$post->getUrlSlug());
  }

  private function singleBySlug($slug) {
    $post = BlogPost::findBySlug($slug);

    $okay = $post !== null && $post->post_status === "publish";

    return $okay ? $this->renderSingle($post) : Redirect::route('blog_root');
  }

  private function renderSingle($post) {
    return View::make('blog.view')->with(array(
      'post' => $post, 
      'title' => $post->post_title
    ));
  }

}
