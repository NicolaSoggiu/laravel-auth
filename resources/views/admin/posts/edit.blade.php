@extends('admin.layouts.base')

@section('contents')

    <h1>Edit post</h1>
    <form class="p-5" method="POST" action="{{ route("admin.posts.update", ["post" => $post]) }}" novalidate>
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input 
                type="text" 
                class="form-control @error("title") is-invalid @enderror"
                id="title" 
                name="title" 
                value="{{ old("title", $post->title) }}" >
            @error("title")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="url_image" class="form-label">Img</label>
            <input 
                type="url" 
                class="form-control @error("url_image") is-invalid @enderror"
                id="url_image" 
                name="url_image" 
                value="{{ old("url_image", $post->url_image) }}">
                @error("url_image")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="repo" class="form-label">Repo</label>
            <textarea 
                class="form-control @error("repo") is-invalid @enderror"
                id="repo" 
                name="repo" 
                rows="3"> {{ old("repo", $post->repo) }}</textarea>
                @error("repo")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
            @enderror
        </div>

            <button class="btn btn-primary">Update</button>
    </form>
    
@endsection