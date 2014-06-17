<?php

class AdminController extends Controller {

  public function getIndex() {
    $log_file =storage_path().'/logs/loftili.log';
    $exists = File::exists($log_file);
    $contents = nl2br($exists ? File::get($log_file) : '');
    return View::make('admin.logs')->with('log_contents', $contents);
  }

}

?>
