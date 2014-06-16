<?php

Route::get('/', 'HomeController@index');
Route::get('/blog', array('as' => 'blog_root', 'uses' => 'BlogController@home'));
Route::get('/blog/{slug}', 'BlogController@single');

Route::group(array('prefix' => 'auth'), function() {
  Route::get('google', 'AuthController@google');
});
