@extends('layouts.main')


@section('content')
<div class="blog">
  <div class="posts">
    @foreach($posts as $post)
    <div class="post">
      <h1>{{ $post->post_title }}</p>
      <p>{{ $post->post_content }}</p>
    </div>
    @endforeach
  </div>
</div>
@endsection
