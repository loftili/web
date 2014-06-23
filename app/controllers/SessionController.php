<?php

class SessionController extends BaseController {

  public function store() {
  }

  public function close() {
    Auth::logout();
    return Redirect::route('root');
  }

}

?>
