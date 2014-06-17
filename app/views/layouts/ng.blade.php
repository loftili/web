<!doctype html>
<html ng-app="lft">
<head>
  @include('partial.head')
</head>
<body>
  <header class="main" lft-header></header>
  <div class="page">
    <div ng-view></div>
  </div>
  <footer class="main" lft-footer></footer>
  <script src="/js/application.js" type="text/javascript"></script>
  @include('partial.ng-config')
  @include('partial.google')
  @yield('scripts')
</body>
</html>
