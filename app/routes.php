<?php

Route::group(array('domain' => 'lofti.local'), function() {
  Route::get('/', 'HomeController@index');
});

Route::group(array('domain' => 'blog.lofti.local'), function() {
  Route::get('/', 'BlogController@home');
});
