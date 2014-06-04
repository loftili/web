<!doctype html>
<html ng-app="lft">
<head>
  <meta charset="utf-8" />
  <title>{{ trans('global.title') }} | {{ $title or trans('global.title_message') }}</title>
</head>
<body>
@yield('content')
<script src="/js/application.js" type="text/javascript"></script>
</body>
</html>
