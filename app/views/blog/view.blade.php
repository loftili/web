@extends('layouts.main')

@section('content')
<div class="blog-single">
  <div class="blog-post" lft-blog-post post="{{ htmlspecialchars(json_encode($post), ENT_QUOTES, 'UTF-8'); }}"></div>
</div>
@endsection
