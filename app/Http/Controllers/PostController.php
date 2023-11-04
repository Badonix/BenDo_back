<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function view(Request $request)
    {
        $posts = Post::all();
        return response($posts);
    }

    public function create(CreatePostRequest $request)
    {
        $attributes = $request->validated();
        $author_id = 1;
        $attributes[$author_id] = $author_id;
        $post = Post::create(["content" => $attributes["content"], "image" => $attributes["image"], ]);
        return response($post, 201);
    }
}
