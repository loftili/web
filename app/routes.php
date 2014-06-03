<?php

$host = App::environment() === 'local' ? 'lofti.local' : 'lofti.li';

Route::group(array('domain' => $host), function() {
  Route::get('/', 'HomeController@index');
});

Route::group(array('domain' => 'blog.'.$host), function() {
  Route::get('/', 'BlogController@home');
});
