<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::query()
            ->where('active', '=', 1)
            ->whereDate('published_at', '<', "" . now())
            ->orderBy('published_at', 'desc')
            ->paginate(5);

        return view('home', compact('posts'));
    }

    public function show(Post $post): View
    {
        if (!$post->active || $post->published_at > now()) {
            throw new NotFoundHttpException();
        }

        $next = Post::query()
            ->where('active', '=', 1)
            ->whereDate('published_at', '<=', now())
            ->whereDate('published_at', '<', $post->published_at)
            ->orderBy('published_at', 'desc')
            ->first();

        $prev = Post::query()
            ->where('active', '=', 1)
            ->whereDate('published_at', '<=', now())
            ->whereDate('published_at', '>', $post->published_at)
            ->orderBy('published_at', 'asc')
            ->first();
        return view('post.show', compact('post', 'next', 'prev'));
    }
    public function category(Category $category): View
    {
        $posts = Post::query()
        ->join('category_post', 'posts.id', '=', 'category_post.post_id')
        ->where('category_post.post_id', '=', $category->id)
        ->where('active', '=', 1)
        ->whereDate('published_at', '<', now())
        ->orderBy('published_at', 'desc')
        ->paginate(5);
    
        return view('home', compact('posts'));
    }
}
