<?php

$app = new Illuminate\Foundation\Application;

$env = $app->detectEnvironment(function() {
  if(array_key_exists('LOFT_PRD', $_SERVER))
    return 'production';
  else
    return 'local';
});

$app->bindInstallPaths(require __DIR__.'/paths.php');

$framework = $app['path.base'].'/vendor/laravel/framework/src';

require $framework.'/Illuminate/Foundation/start.php';

return $app;
