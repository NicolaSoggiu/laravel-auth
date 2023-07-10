<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $categories= Category::all();
        return view("admin.posts.create", compact("categories"));
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
            "title"                 => "required|string|min:5|max:100",
            "category_id"           => "required|integer|exists:categories,id",
            "url_image"             => "required|url|max:200",
            "repo"                  => "required|string|max:100",
        ], [
            "required"              => ":attribute is required",
            "min"                   => ":attribute must have almost :min character",
            "max"                   => ":attribute cannot exceed :max characters",
            "url"                   => ":attribute must be a valid url",
            "exists"                => "The Value is not valid",
        ]);

        $data = $request->all();

        $newPost = new Post();
        $newPost->title              = $data["title"];
        $newPost->category_id        = $data["category_id"];
        $newPost->url_image          = $data["url_image"];
        $newPost->repo               = $data["repo"];
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
        $categories= Category::all();
        return view("admin.posts.edit", compact("post", "categories"));
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
        // $request->validate() TODO
        $data = $request->all();

        $post->title              = $data["title"];
        $post->category_id        = $data["category_id"];
        $post->url_image          = $data["url_image"];
        $post->repo               = $data["repo"];
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