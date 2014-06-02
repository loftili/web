@extends('layouts.application')


@section('content')
<div class="posts">
@foreach($posts as $post)
{{ $post->post_content }}
@endforeach
</div>
@endsection
