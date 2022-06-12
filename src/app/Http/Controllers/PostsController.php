<?php

namespace App\Http\Controllers;

use App\Services\PageService;
use FeedrssFeeding\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request, PageService $service)
    {
        $posts = Post::latest()
            ->paginate($perPage = 20, $columns = ['*'], $pageName = 'posts');

        $popularPosts = $service->getPopularPosts();
        $categories = $service->getPopularCategories();

        return view('public/posts', compact(['posts', 'popularPosts', 'categories']));
    }

    public function show(Request $request, PageService $service)
    {
        $post = Post::where('slug', $request->slug)->first();

        $popularPosts = $service->getPopularPosts();
        $categories = $service->getPopularCategories();

        return view('public/post', compact(['post', 'popularPosts', 'categories']));
    }
}
