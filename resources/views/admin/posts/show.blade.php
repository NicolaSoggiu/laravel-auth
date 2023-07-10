@extends('admin.layouts.base')

@section('contents')

    <h1>Title : {{ $post->title }}</h1>
    <h2>Category : {{ $post->category->name }}</h2>
    <img src="{{ $post->url_image }}" alt="{{ $post->title }}">
    <p>Description : {{ $post->repo }}</p>


    <a class="btn btn-primary" href="{{ route("admin.posts.index") }}">Back to Index</a>
    
@endsection