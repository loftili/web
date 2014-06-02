<?php

class HomeController extends BaseController {

  public function index() {
    return View::make('root.index')->with('dir', 'asasdfasdf');
  }

}
