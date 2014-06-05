@extends('layouts.main')

@section('content')
<div class="blog">
  <div class="page-title">
    <h1>Developer blog</h1>
  </div>
  <div class="posts">
    @foreach($posts as $post)
    <div class="post">
      <h1>{{ $post->post_title }}</h1>
      <p>{{ $post->post_content }}</p>
    </div>
    @endforeach
  </div>
</div>
@endsection
