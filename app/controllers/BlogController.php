<?php

class BlogController extends BaseController {

  public function home() {
    $posts = BlogPost::where('post_status', '=', 'publish')->get();
    foreach($posts as $post) {
      $author = $post->author()->first();
      $post->author = $author;
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
      return $post->post_status === "publish" ? Redirect::to('/blog/'.$post->getUrlSlug()) : Redirect::route('blog_root');
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
