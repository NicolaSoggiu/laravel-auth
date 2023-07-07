<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);

        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "title"         => "required|string|min:5|max:100",
            "url_image"     => "required|url|max:200",
            "repo"          => "required|string|max:100",
        ], [
            "required"              => ":attribute is required",
            "min"                   => ":attribute must have almost :min character",
            "max"                   => ":attribute cannot exceed :max characters",
            "url"                   => ":attribute must be a valid url",
        ]);

        $data = $request->all();

        $newPost = new Post();
        $newPost->title        = $data["title"];
        $newPost->url_image    = $data["url_image"];
        $newPost->repo         = $data["repo"];
        $newPost->save();

        return to_route("admin.posts.show", ["post" => $newPost]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return  view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("admin.posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        $post->title        = $data["title"];
        $post->url_image    = $data["url_image"];
        $post->repo         = $data["repo"];
        $post->update();

        return to_route("admin.posts.show", ["post" => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return to_route("admin.posts.index")->with("delete_success", $post);
    }
}