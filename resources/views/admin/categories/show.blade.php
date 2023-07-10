@extends('admin.layouts.base')

@section('contents')

    <h1>Name : {{ $category->name }}</h1>
    <h2>Description : {{ $category->description }}</h2>

    <h2>Posts in this category</h2>
    <ul>
        @foreach ($category->posts as $post)
            <li><a href="{{ route('admin.posts.show', ['post' => $post]) }}">{{ $post->title }}</a></li>
        @endforeach
    </ul>

    <a class="btn btn-primary" href="{{ route("admin.categories.index") }}">Back to Index</a>
    
@endsection