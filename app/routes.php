<?php

Route::get('/', array('as' => 'root', 'uses' => 'HomeController@index'));

Route::get('/logout', array('as' => 'logout', 'uses' => 'SessionController@close'));
Route::resource('session', 'SessionController', array('only' => array('store', 'index')));

Route::group(array('prefix' => 'auth'), function() {
  Route::controller('google', 'GoogleAuthController');
});

Route::group(array('prefix' => 'blog'), function() {
  Route::get('/', 'BlogBaseController@home');
  Route::get('/posts/{slug}', array('as' => 'blog_root', 'uses' => 'BlogBaseController@single'));
  Route::resource('comments', 'BlogCommentController');
});

Route::controller('admin', 'AdminController');
