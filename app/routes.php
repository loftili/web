<?php

$tld = App::environment() === 'production' ? 'li' : 'local';

Route::group(array('domain' => 'lofti.'.$tld), function() {
  Route::get('/', 'HomeController@index');
});

Route::group(array('domain' => 'blog.lofti.'.$tld), function() {
  Route::get('/', array('as' => 'blog_root', 'uses' => 'BlogController@home'));
});
