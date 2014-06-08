@extends('layouts.main')

@section('content')
<div class="blog">
  <div class="page-title">
    <h1>Developer blog</h1>
  </div>
  <div class="posts">
    @foreach($posts as $post)
      <div class="blog-post" lft-blog-post post="{{ htmlspecialchars(json_encode($post), ENT_QUOTES, 'UTF-8'); }}"></div>
    @endforeach
  </div>
</div>
@endsection
