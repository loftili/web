<!doctype html>
<html ng-app="lft">
<head>
  <meta charset="utf-8" />
  <title>{{ trans('global.title') }} | {{ $title or trans('global.title_message') }}</title>
  <link rel="stylesheet" type="text/css" href="/fonts/index.css" />
  <link rel="stylesheet" type="text/css" href="/css/application.css" />
</head>
<body>
  <header class="main" lft-header></header>
  <div class="page">
    @yield('content')
  </div>
  <footer class="main" lft-footer></footer>
  <script src="/js/application.js" type="text/javascript"></script>
</body>
</html>
