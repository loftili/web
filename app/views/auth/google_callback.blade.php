@extends('layouts.main')

@section('content')
<div>
  <h1>Hang tight...</h1>
  <p>We're closing this window and authenticating you properly</p>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
lft.run(['$window', '$timeout', function($window, $timeout) {
  
  function close() {
    window.close();
  }

  if(!$window.opener || !$window.opener.auth)
    return close();

  $window.opener.auth({{ $user_info }});

  $timeout(close, 1000);

}]);
</script>
@endsection
