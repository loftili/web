<?php

class AdminController extends Controller {

  public function getIndex() {
    if(!Input::get('access_token') && !Auth::check())
      return Redirect::route('root');

    $log_file =storage_path().'/logs/loftili.log';
    $exists = File::exists($log_file);
    $contents = $exists ? File::get($log_file) : '';
    return View::make('admin.logs')->with('log_contents', $contents);
  }

}

?>
