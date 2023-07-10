@extends('admin.layouts.base')

@section('contents')

<h1>Posts : </h1>

@if (session('delete_success'))
        @php $post = session('delete_success') @endphp
        <div class="alert alert-danger">
            The post "{{ $post->title }}" was deleted
        </div>
    @endif

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titolo</th>
            <th scope="col">Category</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td><a href="{{ route("admin.categories.show", ["category" => $post->category]) }}">{{ $post->category->name }}</a></td>
                <td>{{ $post->url_image }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.posts.show', ['post' => $post]) }}">View</a>
                    <a class="btn btn-warning" href="{{ route('admin.posts.edit', ['post' => $post]) }}">Edit</a>
                    <button type="button" class="btn btn-danger js-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $post->id }}">
                        Delete
                      </button>
            </td>
        </tr>
    @endforeach

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <form
                        action=""
                        data-template="{{ route('admin.posts.destroy', ['post' => '*****']) }}"
                        method="post"
                        class="d-inline-block"
                        id="confirm-delete"
                    >
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </tbody>
</table>

<a class="btn btn-primary" href="{{ route("admin.posts.create") }}">Create new post</a>


{{ $posts->links() }}

@endsection