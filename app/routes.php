<?php

Route::get('/', array('as' => 'root', 'uses' => 'HomeController@index'));
Route::get('/blog', array('as' => 'blog_root', 'uses' => 'BlogController@home'));
Route::get('/blog/{slug}', 'BlogController@single');

Route::get('/logout', array('as' => 'logout', 'uses' => 'SessionController@close'));
Route::resource('session', 'SessionController', array('only' => array('store')));

Route::group(array('prefix' => 'auth'), function() {
  Route::controller('google', 'GoogleAuthController');
});

Route::controller('admin', 'AdminController');
