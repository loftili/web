<?php

$tld = App::environment() === 'production' ? 'li' : 'local';

Route::group(array('domain' => 'lofti.'.$tld), function() {
  Route::get('/', 'HomeController@index');

  Route::get('/blog', array('as' => 'blog_root', 'uses' => 'BlogController@home'));
  Route::get('/blog/{slug}', 'BlogController@single');
});
