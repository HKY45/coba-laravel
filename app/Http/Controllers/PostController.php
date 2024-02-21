<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use \App\Models\Category;
use \App\Models\Post;
use \App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        $filter = 'All Posts';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
            $filter = $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
            $filter = $author->name;
        }

        $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(4)->withQueryString();

        return view('posts', [
            "title" => "All Posts" . $title,
            "filter" => $filter,
            "active" => "posts",
            "posts" => $posts
        ]);
    }

    public function home()
    {
        $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(3)->withQueryString();

        return view('home', [
            "title" => "Home",
            "active" => "home",
            "posts" => $posts
        ]);
    }

    public function show(Post $post)
    {
        $posts = Post::latest()->paginate(3)->withQueryString();

        // Ambil post sebelumnya
        $previousPost = $posts->where('id', '<', $post->id)->sortByDesc('id')->first();

        // Ambil post selanjutnya
        $nextPost = $posts->where('id', '>', $post->id)->sortBy('id')->first();

        return view('post', [
            "title" => "View Post",
            "posts" => $posts,
            "active" => "posts",
            "previous" => $previousPost,
            "next" => $nextPost,
            "next" => $nextPost,
            "post" => $post
        ]);
    }
}
