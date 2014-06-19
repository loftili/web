<?php

class AdminController extends Controller {

  public function getIndex() {
    if(!Input::get('access_token') && !Auth::check())
      return Redirect::route('root');

    $log_file = storage_path().'/logs/loftili.log';
    $exists = File::exists($log_file);
    $contents = $exists ? File::get($log_file) : '';
    return View::make('admin.logs')->with('log_contents', $contents);
  }

  public function getClear() {
    if(!Input::get('access_token') && !Auth::check())
      return Redirect::route('root');

    $log_file = storage_path().'/logs/loftili.log';
    File::put($log_file, '');
    return Redirect::to('/admin?access_token='.Input::get('access_token'));
  }

}

?>
