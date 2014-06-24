<?php

class BlogCommentController extends BaseController {


  public function store() {
    $post_id = Input::get('post_id');

    return Response::json(array('post_id' => $post_id));
  }
  

}
