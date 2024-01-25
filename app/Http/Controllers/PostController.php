<?php

namespace App\Http\Controllers;

use Domain\News\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::activeItems()->latest()->paginate(24);
        return view('page.post.index',[
            'posts' => $posts,
        ]);
    }

    public function show($slug)
    {
        return view('page.post.show', [
            'post' => Post::activeItem($slug)->firstOrFail()
        ]);
    }
}
