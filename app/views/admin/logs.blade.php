@extends('layouts.main')

@section('content')
<div>
  <a href="/admin/clear?access_token=1">clear</a>
</div>
<div>
  <code><pre>{{ $log_contents }}</pre></code>
</div>
@endsection
