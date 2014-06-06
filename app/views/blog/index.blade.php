@extends('layouts.main')

@section('content')
<div class="blog">
  <div class="page-title">
    <h1>Developer blog</h1>
  </div>
  <div class="posts">
    @foreach($posts as $post)
    @include('blog.post', array('post' => $post))
    @endforeach
  </div>
</div>
@endsection
