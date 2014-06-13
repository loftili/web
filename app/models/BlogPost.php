<?php

class BlogPost extends Eloquent {

  protected $table = 'wp_posts';
  protected $guarded = array();
  public $timestamps = false;

  public static function findBySlug($slug) {
    $ret = false;
    foreach(static::all() as $post) {
      $title = $post->post_title;
      $lower = strtolower($title);
      $chars = preg_replace('/[^\w\s]/', '', $lower);
      $dashed = preg_replace('/\s/', '-', $chars);

      if($slug === $dashed)
        $ret = $post;
    }
    return $ret;
  }

}

?>
