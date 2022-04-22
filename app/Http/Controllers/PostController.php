<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $posts = Post::with('tags', 'category')->latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id): View|Factory|Application
    {
        $post = Post::with('tags')->findOrFail($id);

        return view('posts.show', compact('post'));
    }
}
