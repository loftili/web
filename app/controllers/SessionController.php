<?php

class SessionController extends BaseController {

  public function __construct() {
    $this->beforeFilter('csrf', array('except' => 'close'));
  }

  public function index() {
    if(!Auth::check())
      return Response::json(array(), 401);
    else
      return Response::json(Auth::user());
  }

  public function store() {
  }

  public function close() {
    Auth::logout();
    return Redirect::route('root');
  }

}

?>
