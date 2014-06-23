<!doctype html>
<html ng-app="lft">
<head>
  @include('partial.head')
</head>
<body>
  <header class="main" lft-header></header>
  <div class="page">
    @yield('content')
  </div>
  <footer class="main" lft-footer></footer>
  @include('partial.scripts')
  @yield('scripts')
</body>
</html>
