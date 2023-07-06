@extends('admin.layouts.base')

@section('contents')

    <h1>{{ $post->title }}</h1>
    <img src="{{ $post->url_image }}" alt="{{ $post->title }}">
    <p>{{ $post->repo }}</p>


    <a class="btn btn-primary" href="{{ route("admin.posts.index") }}">Back to Index</a>
    
@endsection