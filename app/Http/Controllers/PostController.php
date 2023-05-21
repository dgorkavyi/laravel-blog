<?php

namespace App\Http\Controllers;

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

        return view('home', ['posts' => $posts]);
    }

    public function show(Post $post)
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
            ->orderBy('published_at', 'desc')
            ->first();
        return view('post.show', compact('post', 'next', 'prev'));
    }
}
