@extends('layouts.application')

@section('content')
{{ $dir or '' }}
{{ App::environment() }}
@endsection
